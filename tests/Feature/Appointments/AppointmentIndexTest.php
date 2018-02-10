<?php

namespace Tests\Feature\Appointments;

use App\Appointment;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Collection;
use Tests\TestCase;

class AppointmentIndexTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function an_admin_can_browse_all_appointments()
    {
        $admin = factory(User::class, 'admin')->create();

        /** @var Collection $appointments */
        $appointments = factory(Appointment::class, 2)->create();

        $response = $this->actingAs($admin)->get('/appointments');

        $response->assertStatus(200)
            ->assertSee((string)$appointments->get(0)->starts_at)
            ->assertSee($appointments->get(0)->student->name)
            ->assertSee((string)$appointments->get(1)->starts_at)
            ->assertSee($appointments->get(1)->student->name);
    }

    /** @test */
    public function a_guest_is_unable_to_browse_appointments()
    {
        $response = $this->get('/appointments');

        $response->assertStatus(302)->assertRedirect('/login');
    }
}
