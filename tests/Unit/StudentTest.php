<?php
/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   2/10/18
 */

namespace Tests\Unit;


use App\Student;
use Illuminate\Database\Eloquent\Model;

class StudentTest extends UnitTestCase
{
    use ModelTests;

    /** @var Model $model */
    private $model;

    public function setUp()
    {
        parent::setUp();

        $this->model = factory(Student::class)->create();
    }

    /** @test */
    public function a_student_has_a_name()
    {
        $expectedName = $this->model->first_name . ' ' . $this->model->last_name;

        $this->assertEquals($expectedName, $this->model->name);
    }
}