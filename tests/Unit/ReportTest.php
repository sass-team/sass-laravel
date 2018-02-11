<?php
/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   2/10/18
 */

namespace Tests\Unit;

use App\Appointment;
use App\Report;
use App\Student;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class ReportTest extends UnitTestCase
{
    use ModelTests;

    /** @var  Report $model */
    private $model;

    public function setUp()
    {
        parent::setUp();

        $this->model = factory(Report::class)->create();
    }

    /** @test */
    public function a_report_has_many_supplies()
    {
        $this
            ->assertInstanceOf(BelongsToMany::class, $this->model->supplies());
    }

    /** @test */
    public function a_report_has_many_foci()
    {
        $this->assertInstanceOf(BelongsToMany::class, $this->model->foci());
    }

    /** @test */
    public function a_report_has_outcomes()
    {
        $this
            ->assertInstanceOf(BelongsToMany::class, $this->model->outcomes());
    }

    /** @test */
    public function a_report_belongs_to_an_appointment()
    {
        $appointment = factory(Appointment::class)->create();

        $this->model->appointment()->associate($appointment);

        $this->assertInstanceOf(Appointment::class, $this->model->appointment);
    }

    /** @test */
    public function a_report_belongs_to_a_student()
    {
        $student = factory(Student::class)->create();

        $this->model->student()->associate($student);

        $this->assertInstanceOf(Student::class, $this->model->student);
    }
}