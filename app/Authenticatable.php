<?php
/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   2/11/18
 */

namespace App;

use App\SASS\CommonAttributes;
use Illuminate\Foundation\Auth\User;

class Authenticatable extends User
{
    use CommonAttributes;
}