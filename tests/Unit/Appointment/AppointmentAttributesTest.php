<?php

namespace Tests\Unit\Appointment;

use App\Appointment;
use Tests\TestCase;

class AppointmentAttributesTest extends TestCase
{
    /** @var  Appointment */
    protected $appointment;

    public function setUp()
    {
        parent::setUp();

        $this->appointment = factory(Appointment::class)->create();
    }

    /** @test */
    public function an_appointment_has_duration()
    {
        $expectedDuration = sprintf(
            '%s - %s',
            $this->appointment->starts_at,
            $this->appointment->ends_at
        );

        $this->assertEquals($expectedDuration, $this->appointment->duration);
    }

    /** @test */
    public function an_appointment_has_path()
    {
        $expectedPath = '/appointments/' . $this->appointment->id;

        $this->assertEquals($expectedPath, $this->appointment->path);
    }
}
