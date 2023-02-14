<?php

namespace App\Controllers;

use Collator;

class PageController{

    public static function web_render($layout,$view){
        $nav = "Frontend/layouts/".$layout.".html";
        $body = "Frontend/bodies/".$view.".html";
        include "Frontend/header.html";
    }
}