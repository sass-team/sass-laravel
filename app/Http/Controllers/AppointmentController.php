<?php

namespace App\Http\Controllers;

use App\Appointment;

class AppointmentController extends Controller
{
    public function index()
    {
        $appointments = Appointment::query()->latest()->get();

        return view('appointments.index', compact('appointments'));
    }
}
