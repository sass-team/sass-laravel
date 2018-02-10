<?php

namespace Tests\Unit;

use App\Appointment;
use App\Student;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class AppointmentTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function an_appointment_has_a_student()
    {
        $appointment = factory(Appointment::class)->create();

        $this->assertInstanceOf(Student::class, $appointment->student);
    }
}
