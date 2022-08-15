<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientModel extends Model
{       
    use HasFactory;
    
    protected $fillable =[
        "name",
        "gender",
        "adress",
        "email",
        "phone_number",
        "club_id",
        "birth_date",
        "trainer_name",
        "subscription_name",
        "subscription_type"

    ];

    protected $dates =[
    "created_at",
    "updated_at",
    "birth_date"
    
    ];

   public function instructors()
   {
    return $this->hasOne(Instructor::class);
   }

    public function subscription()
    {
        return $this->belongsToMany(SubscriptionModel::class, "client_subscription");
    }
    public function clubs()
    {
        return $this->belongsToMany(Clubs::class,"client_club");
    }

}
