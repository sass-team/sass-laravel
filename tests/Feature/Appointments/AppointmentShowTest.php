<?php
/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   2/10/18
 */

namespace Tests\Feature\Appointments;


use App\Appointment;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class AppointmentShowTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function an_admin_can_browser_an_appointment()
    {
        $appointment = factory(Appointment::class)->create();

        $admin = factory(User::class, 'admin')->create();

        $response = $this->actingAs($admin)
            ->get('/appointments/' . $appointment->id);

        $response
            ->assertStatus(200)
            ->assertSee($appointment->duration)
            ->assertSee($appointment->notes)
            ->assertSee($appointment->creator->name)
            ->assertSee($appointment->tutor->name)
            ->assertSee($appointment->student->name)
            ->assertSee($appointment->instructor->name)
            ->assertSee($appointment->term->name);
    }

    /** @test */
    public function a_guest_is_unable_to_brows_an_appointment()
    {
        $appointment = factory(Appointment::class)->create();

        $response = $this->get('/appointments/' . $appointment->id);

        $response->assertStatus(302)->assertRedirect('/login');
    }
}