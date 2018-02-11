<?php

namespace Tests\Unit\Appointment;

use App\Appointment;
use App\Report;
use App\Student;
use App\User;
use Illuminate\Support\Facades\Auth;
use Tests\Unit\UnitTestCase;

class AppointmentTest extends UnitTestCase
{
    /** @test */
    public function an_appointment_can_add_a_report()
    {
        /** @var Appointment $appointment */
        $appointment = factory(Appointment::class)->create();

        /** @var Student $report */
        $student = factory(Student::class)->create();

        /** @var Report $report */
        $report = factory(Report::class, 'without-relations')
            ->make(['student_id' => $student->id]);

        $admin = factory(User::class, 'admin')->create();

        Auth::login($admin);

        $appointment->addReport($report->toArray());

        $this->assertDatabaseHas('reports', [
            'appointment_id'                  => $appointment->id,
            'student_id'                      => $student->id,
            'creator_id'                      => $admin->id,
            'modifier_id'                     => $admin->id,
            'topic'                           => $report->topic,
            'other'                           => $report->other,
            'student_concerns'                => $report->student_concerns,
            'additional_comments'             => $report->additional_comments,
            'relevant_feedback_or_guidelines' =>
                $report->relevant_feedback_or_guidelines,
        ]);
    }
}
