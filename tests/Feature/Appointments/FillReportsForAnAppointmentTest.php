<?php

namespace Tests\Feature\Appointments;

use App\Appointment;
use App\Model;
use App\Report;
use App\Student;
use App\User;
use Tests\TestCase;

class FillReportsForAnAppointmentTest extends TestCase
{
    /** @test */
    public function an_admin_may_fill_reports_for_an_appointment()
    {
        // Given I have an admin
        $admin = factory(User::class, 'admin')->create();

        // And an existing appointment
        /** @var Appointment $appointment */
        $appointment = factory(Appointment::class)->create();

        /** @var Appointment $appointment */
        $student = factory(Student::class)->create();

        $appointment->students()->save($student);

        /** @var Report $report */
        $report = factory(Report::class, 'without-relations')->make([
            'student_id' => $student->id
        ]);

        // When the admin adds a report to the appointment
        $this->actingAs($admin)
            ->post($appointment->reportsPath, $report->toArray());

        $this->assertDatabaseHas('reports', [
            'appointment_id' => $appointment->id
        ]);

        // Then the report should be visible on the page
        $this->get($appointment->path)
            ->assertSee($report->topic);
    }
}
