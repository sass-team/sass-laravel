<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $dates = ['created_at', 'updated_at', 'starts_at', 'ends_at'];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
