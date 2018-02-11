<?php
/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   2/11/18
 */

namespace App\SASS;


use App\Model;
use App\User;

trait CommonAttributes
{
    public function creator()
    {
        /** @var Model $model */
        $model = $this;

        return $model->belongsTo(User::class);
    }

    public function modifier()
    {
        /** @var Model $model */
        $model = $this;

        return $model->belongsTo(User::class);
    }
}