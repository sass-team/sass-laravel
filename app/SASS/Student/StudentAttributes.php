<?php

namespace App\SASS\Student;

use App\Student;

/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   2/10/18
 */
trait StudentAttributes
{
    public function getNameAttribute()
    {
        /** @var Student $student */
        $student = $this;

        return sprintf('%s %s', $student->first_name, $student->last_name);
    }
}