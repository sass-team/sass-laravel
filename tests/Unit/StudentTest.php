<?php
/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   2/10/18
 */

namespace Tests\Unit;


use App\Student;
use Tests\TestCase;

class StudentTest extends TestCase
{
    /** @test */
    public function a_student_has_a_name()
    {
        $student = factory(Student::class)->create();

        $expectedName = $student->first_name . ' ' . $student->last_name;

        $this->assertEquals($expectedName, $student->name);
    }
}