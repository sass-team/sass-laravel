<?php

namespace Tests\Unit\Appointment;

use App\Appointment;
use App\Course;
use App\Instructor;
use App\Term;
use App\User;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Collection;
use Tests\TestCase;

class AppointmentTest extends TestCase
{
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
    public function an_appointment_has_many_students()
    {
        $this->assertInstanceOf(
            BelongsToMany::class, $this->appointment->students()
        );

        $this->assertInstanceOf(
            Collection::class, $this->appointment->students
        );
    }

    /** @test */
    public function an_appoint_has_an_instructor()
    {
        $this->assertInstanceOf(
            Instructor::class, $this->appointment->instructor
        );
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

    /** @test */
    public function an_appointment_has_many_reports()
    {
        $this->assertInstanceOf(HasMany::class, $this->appointment->reports());

        $this->assertInstanceOf(
            Collection::class, $this->appointment->reports
        );
    }

    /** @test */
    public function an_appointment_has_a_creator()
    {
        $this->assertInstanceOf(User::class, $this->appointment->creator);
    }

    /** @test */
    public function an_appointment_has_a_modifier()
    {
        $this->assertInstanceOf(User::class, $this->appointment->modifier);
    }
}
