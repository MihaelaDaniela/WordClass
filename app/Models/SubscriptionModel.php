<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubscriptionModel extends Model
{

    use HasFactory;
    
    protected $fillable =[
        "name",
        "description",
        "price",
    ];

    protected $dates =[
    "created_at",
    "updated_at"
    ];

    public function client(){

    return $this->belongsTo(ClientModel::class, 'client_subscription');

    }
    public function fitnesses(){

        return $this->belongsToMany(Fitness::class, "fitness_subscription_model");
    }

}
