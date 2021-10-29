<?php

use Whoops\Handler\PrettyPageHandler;

//Database params
define('DB_HOST', 'localhost'); //Add your db host
define('DB_USER', 'root'); // Add your DB root
define('DB_PASS', ''); //Add your DB pass
define('DB_NAME', 'mvcframework'); //Add your DB Name

//APPROOT
define('APPROOT', dirname(dirname(__FILE__)));

//URLROOT (Dynamic links)
define('URLROOT', 'http://localhost/mvcframework/');

//Sitename
define('SITENAME', 'MVC Framework');


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
include __DIR__ . '/../../vendor/autoload.php';
$whoops = new \Whoops\Run;

$handler = new PrettyPageHandler;
$handler->setEditor('vscode');
$whoops->pushHandler($handler);
$whoops->register();



// $someVar = 'test';
// dump($someVar);
// // dump() returns the passed value, so you can dump an object and keep using it
// dump($whoops)->someMethod();
