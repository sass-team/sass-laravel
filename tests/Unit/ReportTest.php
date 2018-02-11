<?php
/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   2/10/18
 */

namespace tests\Unit;

use App\Appointment;
use App\Report;
use App\Student;
use App\User;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class ReportTest extends TestCase
{
    /** @var  Report */
    private $report;

    public function setUp()
    {
        parent::setUp();

        $this->report = factory(Report::class)->create();
    }

    /** @test */
    public function a_report_has_many_supplies()
    {
        $this
            ->assertInstanceOf(BelongsToMany::class, $this->report->supplies());
    }

    /** @test */
    public function a_report_has_many_foci()
    {
        $this->assertInstanceOf(BelongsToMany::class, $this->report->foci());
    }

    /** @test */
    public function a_report_has_outcomes()
    {
        $this
            ->assertInstanceOf(BelongsToMany::class, $this->report->outcomes());
    }

    /** @test */
    public function a_report_belongs_to_an_appointment()
    {
        $appointment = factory(Appointment::class)->create();

        $this->report->appointment()->associate($appointment);

        $this->assertInstanceOf(Appointment::class, $this->report->appointment);
    }

    /** @test */
    public function a_report_belongs_to_a_student()
    {
        $student = factory(Student::class)->create();

        $this->report->student()->associate($student);

        $this->assertInstanceOf(Student::class, $this->report->student);
    }

    /** @test */
    public function a_report_has_a_creator()
    {
        $this->assertInstanceOf(User::class, $this->report->creator);
    }

    /** @test */
    public function a_report_has_a_modifier()
    {
        $this->assertInstanceOf(User::class, $this->report->modifier);
    }
}