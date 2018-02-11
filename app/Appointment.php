<?php

namespace App;

use App\SASS\Appointment\AppointmentAttributes as HasAttributes;
use App\SASS\HasCreatorAndModifier;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasAttributes, HasCreatorAndModifier;

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
}
