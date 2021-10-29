<?php

use DebugBar\StandardDebugBar;

//Require libraries from folder libraries
require_once 'config/config.php';

require_once 'libraries/Core.php';
require_once 'libraries/Controller.php';
require_once 'libraries/Database.php';

$debugbar = new StandardDebugBar();
    $debugbarRenderer = $debugbar->getJavascriptRenderer("/mvcframework/vendor/maximebf/debugbar/src/DebugBar/Resources/");
    $debugbar["messages"]->addMessage("hello world!");

//Instantiate core class
$init = new Core();
