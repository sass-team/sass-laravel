<?php

namespace Tests\Feature\Appointments;

use App\Appointment;
use App\Report;
use App\Student;
use App\User;
use Illuminate\Auth\AuthenticationException;
use Tests\TestCase;

class FillReportsForAnAppointmentTest extends TestCase
{
    /** @test */
    public function a_guest_may_not_fill_reports()
    {
        /** @var Appointment $appointment */
        $appointment = factory(Appointment::class)->create();

        $this->expectException(AuthenticationException::class);

        $this->post($appointment->reportsPath)->assertRedirect('/login');
    }

    /** @test */
    public function an_admin_may_fill_reports_for_an_appointment()
    {
        /** @var User $admin */
        $admin = factory(User::class, 'admin')->create();

        /** @var Appointment $appointment */
        $appointment = factory(Appointment::class)->create();

        /** @var Appointment $appointment */
        $student = factory(Student::class)->create();

        $appointment->students()->save($student);

        /** @var Report $report */
        $report = factory(Report::class, 'without-relations')->make([
            'student_id' => $student->id
        ]);

        $this->actingAs($admin)
            ->post($appointment->reportsPath, $report->toArray())
            ->assertRedirect($appointment->path);

        $this->get($appointment->path)->assertSee($report->topic);
    }
}
