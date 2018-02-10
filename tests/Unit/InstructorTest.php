<?php
/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   2/10/18
 */

namespace tests\Unit;

use App\Instructor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class InstructorTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function an_instructor_has_name()
    {
        /** @var Model $instructor */
        $instructor = factory(Instructor::class)->create();

        $expectedName = sprintf(
            '%s %s',
            $instructor->first_name,
            $instructor->last_name

        );
        $this->assertEquals($expectedName, $instructor->name);
    }
}