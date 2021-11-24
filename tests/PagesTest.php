<?php

namespace app\tests;

use Pages;
use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../app/controllers/Pages.php';
require_once __DIR__ . '/../app/libraries/Controller.php';
// require_once __DIR__ . '/../app/models/User.php';
require_once __DIR__ . '/../app/libraries/Database.php';
require_once __DIR__ . '/../app/config/config.php';

class PagesTest extends TestCase
{
    public function testcreate()
    {
        $create = new Pages();
        $result = $create->addUser('name', 'email@email.com', 123123);
        $this->assertTrue($result);
    }

    public function testSignUp()
    {
        $signup = new Pages();
        $result = $signup->userSignup('name', 'email.email.com', 123123);
        $this->assertTrue($result);
    }

    public function testDelete()
    {
        $delete = new Pages();
        $result = $delete->userDelete(24);
        $this->assertTrue($result);
    }

    public function testEdit()
    {
        $update = new Pages();
        $result = $update->userEdit(52, 'editUser');
        $this->assertTrue($result);
    }

    public function testLogin()
    {
        $login = new Pages();
        $result = $login->userLogin('test@test.com', 12);
        $this->assertIsObject($result);
        $this->assertEquals($result->type, 'user');

    }
}
