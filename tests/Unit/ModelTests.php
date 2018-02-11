<?php
/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   2/11/18
 */

namespace Tests\Unit;


use App\User;
use Illuminate\Database\Eloquent\Model;
use Tests\TestCase;

trait ModelTests
{
    /** @test */
    public function a_model_has_a_creator()
    {
        /** @var TestCase $test */
        $test = $this;

        /** @var Model $model */
        $model = $this->model;

        $test->assertInstanceOf(User::class, $model->creator);
    }

    /** @test */
    public function a_model_has_a_modifier()
    {
        /** @var TestCase $test */
        $test = $this;
        /** @var Model $model */
        $model = $this->model;

        $test->assertInstanceOf(User::class, $model->modifier);
    }
}