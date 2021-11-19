<?php

namespace app\tests;

use Pages;
use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../app/controllers/Pages.php';
require_once __DIR__ . '/../app/libraries/Controller.php';

class PagesTest extends TestCase
{
    public function testAdd()
    {
        $add = new Pages();
        $result = $add->add(2, 2);
        $this->assertEquals(4, $result);
    }
}
