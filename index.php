<?php
declare(strict_types=1);

ini_set('display_errors', "1");
ini_set('display_startup_errors', "1");
error_reporting(E_ALL);

//include all your model files here
require 'env.php';
require 'Model/User.php';
require 'Model/Customer.php';
require 'Model/CustomerGroup.php';
require 'Model/Product.php';
require 'Model/Database.php';
require 'Model/CustomerLoader.php';
require 'Model/CustomerGroupLoader.php';
require 'Model/ProductLoader.php';

//include all your controllers here
require 'Controller/HomepageController.php';
require 'Controller/InfoController.php';
require 'Controller/StoreController.php';


//you could write a simple IF here based on some $_GET or $_POST vars, to choose your controller
//this file should never be more than 20 lines of code!
$controller = new HomepageController();
if(isset($_GET['page']) && $_GET['page'] === 'info') {
    $controller = new InfoController();
}elseif(isset($_GET['page']) && $_GET['page'] === 'store') {
    $controller = new StoreController();
}

$controller->render($_GET, $_POST);