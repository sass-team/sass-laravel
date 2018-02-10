<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public function getNameAttribute()
    {
        return sprintf('%s %s', $this->first_name, $this->last_name);
    }
}
