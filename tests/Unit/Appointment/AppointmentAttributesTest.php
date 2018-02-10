<?php

namespace Tests\Unit\Appointment;

use App\Appointment;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class AppointmentAttributesTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function an_appointment_has_duration()
    {
        $appointment = factory(Appointment::class)->create();

        $expectedDuration = sprintf(
            '%s - %s',
            $appointment->starts_at,
            $appointment->ends_at
        );

        $this->assertEquals($expectedDuration, $appointment->duration);
    }
}
