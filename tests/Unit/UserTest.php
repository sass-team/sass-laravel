<?php
/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   2/10/18
 */

namespace Tests\Unit;

use App\User;

class UserTest extends UnitTestCase
{
    use ModelTests;

    /** @var  User $user */
    private $model;

    public function setUp()
    {
        parent::setUp();

        $this->model = factory(User::class, 'secretary')->create();
    }

    /** @test */
    public function a_user_has_a_name()
    {
        $expectedName = $this->model->first_name;

        $expectedName .= ' ' . $this->model->last_name;

        $this->assertEquals($expectedName, $this->model->name);
    }
}