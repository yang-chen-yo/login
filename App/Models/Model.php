<?php

namespace App\Models;

include 'env.php';

use \PDO;
use \PDOException;
use \Environment\Database as DB;

class Model
{
    public static function connect()
    {
        try {
            $connection = new PDO(
                DB::$TYPE . ":host=" . DB::$HOST . ";dbname=" . DB::$NAME,
                DB::$USER,
                DB::$PASS
            );
            $connection->query("set names utf8");
            return $connection;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return null;    
        }
    }
}
