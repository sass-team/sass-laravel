<?php

namespace Tests\Feature\Appointments;

use App\Appointment;
use App\User;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Support\Collection;
use Tests\TestCase;

class ReadAppointmentsListTest extends TestCase
{
    /** @test */
    public function an_admin_can_browse_all_appointments()
    {
        $admin = factory(User::class, 'admin')->create();

        /** @var Collection $appointments */
        $appointments = factory(Appointment::class, 2)->create();

        $response = $this->actingAs($admin)->get('/appointments');

        $response->assertStatus(200)
            ->assertSee($appointments->get(0)->course->name)
            ->assertSee($appointments->get(0)->duration)
            ->assertSee($appointments->get(0)->notes)
            ->assertSee($appointments->get(0)->path)
            ->assertSee($appointments->get(1)->course->name)
            ->assertSee($appointments->get(1)->duration)
            ->assertSee($appointments->get(1)->notes)
            ->assertSee($appointments->get(1)->path);

    }

    /** @test */
    public function a_guest_is_unable_to_browse_appointments()
    {
        $this->expectException(AuthenticationException::class);

        $response = $this->get('/appointments');

        $response->assertStatus(302)->assertRedirect('/login');
    }
}
