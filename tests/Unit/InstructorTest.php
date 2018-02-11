<?php
/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   2/10/18
 */

namespace Tests\Unit;

use App\Instructor;
use App\User;
use Tests\TestCase;

class InstructorTest extends TestCase
{
    use HasCreatorAndModifierTests;

    /** @var  Instructor */
    private $model;

    public function setUp()
    {
        parent::setUp();

        $this->model = factory(Instructor::class)->create();
    }

    /** @test */
    public function an_instructor_has_name()
    {
        $expectedName = sprintf(
            '%s %s',
            $this->model->first_name,
            $this->model->last_name

        );
        $this->assertEquals($expectedName, $this->model->name);
    }
}