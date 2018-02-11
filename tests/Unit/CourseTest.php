<?php
/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   2/11/18
 */

namespace Tests\Unit;

use App\Course;
use Tests\TestCase;

class CourseTest extends UnitTestCase
{
    use ModelTests;

    /** @var  Course */
    private $model;

    public function setUp()
    {
        parent::setUp();

        $this->model = factory(Course::class)->create();
    }
}