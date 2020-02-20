<?php
declare(strict_types=1);

//include all your model files here
require 'Model/User.php';
require 'Model/product.php';
require 'Model/Loader.php';

//include all your controllers here
require 'Controller/HomepageController.php';
session_start();


//you could write a simple IF here based on some $_GET or $_POST vars, to choose your controller
//this file should never be more than 20 lines of code!
$controller = new HomepageController();
$controller->render($_GET, $_POST);