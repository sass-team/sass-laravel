<?php
/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   2/10/18
 */

namespace App\SASS\Instructor;


use App\Instructor;

trait InstructorAttributes
{
    public function getNameAttribute()
    {
        /** @var Instructor $instructor */
        $instructor = $this;

        return sprintf('%s %s', $instructor->first_name, $instructor->last_name);
    }
}