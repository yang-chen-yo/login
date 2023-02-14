<?php

namespace App\Models;

class Admin extends Model
{
    public static function creat($account,$password){
        $sql = "INSERT INTO `admins` (`account`,`password`) VALUES('$account','$password')";
        $connection = Model::connect();
        $state = $connection->prepare($sql);
        $state->execute();
    }

    public static function retrieveByAccount($account)
    {
        $sql = "SELECT * FROM `admins` WHERE `account` = '$account'";
        $connection =  Model::connect();
        $state = $connection->prepare($sql);
        $state->execute();
        return $state->fetch();
    }
}
