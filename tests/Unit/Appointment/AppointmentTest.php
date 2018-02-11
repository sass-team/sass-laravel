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
use Tests\Unit\ModelTests;
use Tests\Unit\UnitTestCase;

class AppointmentTest extends UnitTestCase
{
    use ModelTests;

    /** @var  Appointment */
    protected $model;

    public function setUp()
    {
        parent::setUp();

        $this->model = factory(Appointment::class)->create();
    }

    /** @test */
    public function an_appointment_has_a_course()
    {
        $this->assertInstanceOf(Course::class, $this->model->course);
    }

    /** @test */
    public function an_appointment_has_many_students()
    {
        $this->assertInstanceOf(
            BelongsToMany::class, $this->model->students()
        );

        $this->assertInstanceOf(
            Collection::class, $this->model->students
        );
    }

    /** @test */
    public function an_appoint_has_an_instructor()
    {
        $this->assertInstanceOf(
            Instructor::class, $this->model->instructor
        );
    }

    /** @test */
    public function an_appointment_has_a_tutor()
    {
        $this->assertInstanceOf(User::class, $this->model->tutor);
    }

    /** @test */
    public function an_appointment_has_a_term()
    {
        $this->assertInstanceOf(Term::class, $this->model->term);
    }

    /** @test */
    public function an_appointment_has_many_reports()
    {
        $this->assertInstanceOf(HasMany::class, $this->model->reports());

        $this->assertInstanceOf(
            Collection::class, $this->model->reports
        );
    }
}
