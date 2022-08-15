<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clubs extends Model
{
    use HasFactory;
    
    protected $fillable =[
        "name",
        "country",
        "city",
        "adress"
    ];

    protected $dates = [
        'created_at',
        'updated_at'
    ];

    public function instructors()
    {
        return $this->hasMany(InstructorModel::class);
    }
    public function clients()
    {
        return $this->hasMany(ClientModel::class,"client_club");
    }
    public function subscriptions()
    {
        return $this->hasMany(SubscriptionModel::class, 'client_subscription');
    }
}
