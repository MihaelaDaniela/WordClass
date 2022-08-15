<?php
namespace App\General\Concretes;

use App\General\Abstracts\AppSts;
use App\General\Interfaces\IStatus;

class InstructorStatus extends AppSts
    {
        public const AVAILABLE = 'available';
        public const UNAVAILABLE= 'unavailable';
    
        public const AVAILABLE_ID = 1;
        public const UNAVAILABLE_ID = 0;
    
        protected static $sts = [
            self::AVAILABLE => self::AVAILABLE_ID,
            self::UNAVAILABLE => self::UNAVAILABLE_ID,
            
        ];
    }
    