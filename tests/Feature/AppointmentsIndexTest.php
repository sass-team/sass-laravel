<?php

namespace Tests\Feature;

use App\Appointment;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Collection;
use Tests\TestCase;

class AppointmentsIndexTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function a_user_can_browse_threads()
    {
        /** @var Collection $appointments */
        $appointments = factory(Appointment::class, 2)->create();

        $response = $this->get('/appointments');

        $response->assertStatus(200)
            ->assertSee((string)$appointments->get(0)->starts_at)
            ->assertSee($appointments->get(0)->student->name)
            ->assertSee((string)$appointments->get(1)->starts_at)
            ->assertSee($appointments->get(1)->student->name);
    }
}
