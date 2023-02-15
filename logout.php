<?php

session_start();
if( $_SESSION['is_admin'] == true){
    session_destroy();
    header('Location:admin-login.php');
    exit();
}
else{
    session_destroy();
    header('Location:login.php');
    exit();
}