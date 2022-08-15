<?php

namespace App\General\Abstracts;
use App\General\Interfaces\IStatus;

abstract class AppSts implements IStatus
{
    protected static $sts;

    public static function getIdByValue($value)
    {
        return static::$sts[$value];
    }

    public static function getValueById($id)
    {
        return array_search($id,static::$sts,true);
    }

    public static function getStatus()
    {
        return static::$sts;
    }
}
