<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fitness extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'intensity_level',
        'equipment',
        'upload_file'
        
    ];

    protected $dates = [
        'created_at',
        'updated_at'
    ];

    public function instructors()
    {
        return $this->belongsToMany(InstructorModel::class);
    }
    public function subscriptions()
    {
        return $this->belongsToMany(SubscriptionModel::class, "fitness_subscriptions_model");
    }
}
