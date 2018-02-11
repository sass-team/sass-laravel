<?php

namespace App\Http\Controllers;

use App\Appointment;
use App\Report;
use App\Student;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    public function store(Request $request, Appointment $appointment)
    {
        /** @var User $user */
        $user = Auth::user();
        /** @var Report $report */
        $report = new Report($request->all());
        /** @var Student $student */
        $student = Student::query()->findOrFail($request->get('student_id'));

        $report->appointment()->associate($appointment);
        $report->student()->associate($student);
        $report->creator()->associate($user);
        $report->modifier()->associate($user);

        $report->save();
    }
}
