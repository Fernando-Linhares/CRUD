<?php
require "../vendor/autoload.php";
//the server must to be here
use Core\Kernel;
//the class that load the router
$app = new Kernel;
$app->start();