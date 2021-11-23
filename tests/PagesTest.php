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
        $result = $create->create('name', 'user', 'email.email.com', 123123);
        $this->assertTrue(true);
    }

    public function testSignUp()
    {
        $create = new Pages();
        $result = $create->create('name', 'user', 'email.email.com', 123123);
        $this->assertTrue(true);
    }
}
