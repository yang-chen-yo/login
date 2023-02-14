<?php

namespace App\Controllers;

class Controller
{
    public static function json_response($data)
    {
        $response = json_encode($data);
        header('Content-Type: application/json; charset=utf-8');
        echo $response;
    }
}
