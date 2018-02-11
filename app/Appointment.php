<?php

namespace App;

use App\SASS\Appointment\AppointmentAttributes as HasAttributes;
use Illuminate\Database\Eloquent\Model;

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

    public function creator()
    {
        return $this->belongsTo(User::class);
    }

    public function modifier()
    {
        return $this->belongsTo(User::class);
    }
}
