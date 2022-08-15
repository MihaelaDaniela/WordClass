<?php
namespace App\General\Interfaces;

interface IGender
{
    public static function getValueById($id);
    public static function getIdByValue($value);
    public static function getGender();
}
