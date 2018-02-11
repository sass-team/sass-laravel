<?php

namespace App\Http\Controllers;

use App\Appointment;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function store(Request $request, Appointment $appointment)
    {
        $appointment->addReport($request->all());

        return redirect($appointment->path);
    }
}
