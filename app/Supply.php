<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supply extends Model
{
    static $templates = [
        "Assignment (graded)", "Draft", "Instructor's feedback", "Textbook",
        "Notes", "Assignment sheet", "Exercise on", "Other"
    ];
}
