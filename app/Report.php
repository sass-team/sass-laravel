<?php

namespace App;

class Report extends Model
{
    protected $fillable = ['topic', 'other', 'student_concerns',
                           'relevant_feedback_or_guidelines',
                           'additional_comments'];

    public function supplies()
    {
        return $this->belongsToMany(Supply::class);
    }

    public function foci()
    {
        return $this->belongsToMany(Focus::class);
    }

    public function outcomes()
    {
        return $this->belongsToMany(Outcome::class);
    }

    public function appointment()
    {
        return $this->belongsTo(Appointment::class);
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
