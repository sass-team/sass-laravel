<?php
/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   2/10/18
 */

namespace App\SASS\User;


use App\User;

trait UserAttributes
{
    public function getNameAttribute()
    {
        /** @var User $user */
        $user = $this;

        return sprintf('%s %s', $user->first_name, $user->last_name);
    }
}