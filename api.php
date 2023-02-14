<?php

include 'autoload.php';

use App\Controllers\AdminController;
use App\Extensions\HttpException;

session_start();
$requestBody = file_get_contents('php://input');
$request = json_decode($requestBody, true);

switch($_GET['route']){
    case 'post/admin-login':
        $AdminController = new AdminController();
        $AdminController->login($request);
        break;
    default:
        new HttpException(404, "Route is not found");

}