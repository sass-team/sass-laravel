<?php

namespace App;

use App\SASS\HasCreatorAndModifier;
use App\SASS\Instructor\InstructorAttributes as HasAttributes;
use Illuminate\Database\Eloquent\Model;

class Instructor extends Model
{
    use HasAttributes, HasCreatorAndModifier;
}
