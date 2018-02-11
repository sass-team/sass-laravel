<?php
/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   2/11/18
 */

namespace App;

use App\SASS\CommonAttributes;
use Illuminate\Database\Eloquent\Model as LaravelModel;

abstract class Model extends LaravelModel
{
    use CommonAttributes;
}