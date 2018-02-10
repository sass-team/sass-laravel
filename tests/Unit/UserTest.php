<?php
/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   2/10/18
 */

namespace Tests\Unit;


use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class UserTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function a_user_has_a_name()
    {
        $user = factory(User::class)->create();

        $expectedName = $user->first_name . ' ' . $user->last_name;

        $this->assertEquals($expectedName, $user->name);
    }
}