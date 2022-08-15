<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InstructorModel extends Model
{   use HasFactory;
    
    protected $fillable =[
        "name",
        "description",
        "status",
        "workout_type",
        "clubs_id",
        "upload_file"
    ];

    protected $dates =[
    "created_at",
    "updated_at"
    ];

    public function fitnesses(){
    return $this->belongsToMany(Fitness::class);
    }
    public function client(){
        return $this->hasMany(ClientModel::class);
    }
    public function club(){
        return $this->belongsTo(Clubs::class, 'clubs_id', 'id');
    }
}