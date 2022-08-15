<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    
    protected $fillable =[
        "user_id",
        "name",
        "email",
        "birth_date",
        "gender",
        "adress",
        "user_type",
        "uploadFile",
    ];

    protected $dates =[
        "created_at",
        "updated_at",
        "birth_date"
        
        ];
        public function user()
        {
            return $this->belongsTo(User::class);
        }
}
