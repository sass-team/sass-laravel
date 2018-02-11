<?php

namespace Tests\Unit\Appointment;

use App\Appointment;
use App\Model;
use Tests\Unit\UnitTestCase;

class AppointmentAttributesTest extends UnitTestCase
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
        $this->withoutEvents();
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

    /** @test */
    public function an_appointment_has_reports_path()
    {
        $expectedPath = '/appointments/' . $this->appointment->id . '/reports';

        $this->assertEquals($expectedPath, $this->appointment->reportsPath);
    }
}
