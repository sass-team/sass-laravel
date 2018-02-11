<?php
/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   2/11/18
 */

namespace App\SASS;


use App\User;
use Illuminate\Database\Eloquent\Model;

trait HasCreatorAndModifier
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