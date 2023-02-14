<?php

namespace App\Controllers;


use \App\Models\Admin;
use App\Extensions\HttpException;

class AdminController extends Controller
{
    public function login($request)
    {
        $admin = Admin::retrieveByAccount($request['account']);
        if (isset($admin['password']) && $admin['password'] == $request['password']) {
            $_SESSION['id'] = $admin['id'];
            $_SESSION['is_admin'] = true;
        }
        else{
            new HttpException(403, '您輸入的帳號密碼有誤，請確認無誤後再次送出!');
        }
    }
   
}   