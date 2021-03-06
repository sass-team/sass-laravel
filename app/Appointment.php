<?php

namespace App;

use App\SASS\Appointment\AppointmentAttributes as HasAttributes;
use Illuminate\Support\Facades\Auth;

class Appointment extends Model
{
    use HasAttributes;

    protected $dates = ['created_at', 'updated_at', 'starts_at', 'ends_at'];
    protected $fillable = ['starts_at', 'ends_at', 'notes'];

    public function students()
    {
        return $this->belongsToMany(Student::class);
    }

    public function tutor()
    {
        return $this->belongsTo(User::class);
    }

    public function instructor()
    {
        return $this->belongsTo(Instructor::class);
    }

    public function term()
    {
        return $this->belongsTo(Term::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function reports()
    {
        return $this->hasMany(Report::class);
    }

    public function addReport($data)
    {
        /** @var User $user */
        $user = Auth::user();
        /** @var Report $report */
        $report = new Report($data);
        /** @var Student $student */
        $student = Student::query()->findOrFail($data['student_id']);

        $report->appointment()->associate($this);
        $report->student()->associate($student);
        $report->creator()->associate($user);
        $report->modifier()->associate($user);

        $report->save();
    }
}
