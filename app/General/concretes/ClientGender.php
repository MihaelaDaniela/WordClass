<?php
namespace App\General\Concretes;

use App\General\Abstracts\AppGen;
use App\General\Interfaces\IGender;

class ClientGender extends AppGen
    {
        public const FEMALE = 'Female';
        public const MALE= 'Male';
    
        public const FEMALE_ID = 1;
        public const MALE_ID = 0;
    
        protected static $gen = [
            self::FEMALE => self::FEMALE_ID,
            self::MALE => self::MALE_ID,
            
        ];
    }
    