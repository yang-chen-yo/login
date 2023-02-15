<?php

include 'autoload.php';

use \App\Controllers\PageController;

session_start();
if (isset($_SESSION['id']) && $_SESSION['is_admin'] == true) {
    header('Location: admin-dashboard.php');
    exit();
}

PageController::web_render('space', 'admin-login');
