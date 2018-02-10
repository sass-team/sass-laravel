<?php

namespace Tests\Unit\Appointment;

use App\Appointment;
use App\Course;
use App\Instructor;
use App\Student;
use App\Term;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class AppointmentTest extends TestCase
{
    use DatabaseMigrations;

    /** @var  Appointment */
    protected $appointment;

    public function setUp()
    {
        parent::setUp();

        $this->appointment = factory(Appointment::class)->create();
    }

    /** @test */
    public function an_appointment_has_a_course()
    {
        $this->assertInstanceOf(Course::class, $this->appointment->course);
    }

    /** @test */
    public function an_appointment_has_a_student()
    {
        $this->assertInstanceOf(Student::class, $this->appointment->student);
    }

    /** @test */
    public function an_appoint_has_an_instructor()
    {
        $this->assertInstanceOf(
            Instructor::class, $this->appointment->instructor
        );
    }

    /** @test */
    public function an_appointment_has_a_creator()
    {
        $this->assertInstanceOf(User::class, $this->appointment->creator);
    }

    /** @test */
    public function an_appointment_has_a_tutor()
    {
        $this->assertInstanceOf(User::class, $this->appointment->tutor);
    }

    /** @test */
    public function an_appointment_has_a_term()
    {
        $this->assertInstanceOf(Term::class, $this->appointment->term);
    }
}
