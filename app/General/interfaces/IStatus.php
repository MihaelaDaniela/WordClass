<?php
namespace App\General\Interfaces;

interface IStatus
{
    public static function getValueById($id);
    public static function getIdByValue($value);
    public static function getStatus();
}
