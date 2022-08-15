<?php

namespace App\General\Abstracts;
use App\General\Interfaces\IGender;

abstract class AppGen implements IGender
{
    protected static $gen;

    public static function getIdByValue($value)
    {
        return static::$gen[$value];
    }

    public static function getValueById($id)
    {
        return array_search($id,static::$gen,true);
    }

    public static function getGender()
    {
        return static::$gen;
    }
}