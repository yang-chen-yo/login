<?php

include "autoload.php";

use \App\Controllers\PageController;

session_start();

if (isset($_SESSION["id"]) && $_SESSION["is_admin"] == true) {
    PageController::web_render('admin-layout','admin-dashboard');
}
else{
    header("Location: admin-login.php");
    exit();
}
