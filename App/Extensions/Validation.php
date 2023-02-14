<?php

namespace App\Extensions;

class Validation
{
    public static function validate($list, $request)
    {
        foreach ($list as $key => $rules) {
            foreach ($rules as $rule) {
                $rule = preg_split('[:]', $rule);
                if (
                    count($rule)<=1 && !Validation::isCorrectDataType($request, $key, $rule)
                    || count($rule)>1 && !Validation::isCorrectDataStatus($request, $key, $rule)
                ){
                    new HttpException(400, '您輸入的資料格式有錯，請確認無誤後再次送出!');
                }
            }
        }
    }

    private static function isCorrectDataType($request, $key, $rule)
    {
        switch ($rule[0]) {
            case ('bool'):
                return is_bool($request[$key]);
                break;
            case ('intger'):
                return is_integer($request[$key]);
                break;
            case ('float'):
                return is_float($request[$key]);
                break;
            case ('string'):
                return is_string($request[$key]);
                break;
            case ('array'):
                return is_array($request[$key]);
                break;
            case ('null'):
                return is_null($request[$key]);
                break;
            default:
                return true;
        }
    }

    private static function isCorrectDataStatus($request, $key, $rule)
    {
        switch ($rule[0]) {
            case ('max'):
                return $request[$key] <= $rule[1];
                break;
            case ('min'):
                return $request[$key] >= $rule[1];
                break;
            case ('size'):
                return strlen($request[$key]) == $rule[1];
                break;
            case ('size-min'):
                return strlen($request[$key]) >= $rule[1];
                break;
            case ('size-max'):
                return strlen($request[$key]) <= $rule[1];
                break;
        }
    }
}
