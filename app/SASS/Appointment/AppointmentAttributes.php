<?php

namespace App\SASS\Appointment;

/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   2/10/18
 */
trait AppointmentAttributes
{
    public function getDurationAttribute()
    {
        /** @var \App\Appointment $appointment */
        $appointment = $this;

        return sprintf(
            '%s - %s',
            $appointment->starts_at,
            $appointment->ends_at
        );
    }
}