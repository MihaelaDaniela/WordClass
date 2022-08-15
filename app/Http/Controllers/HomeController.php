<?php

namespace App\Http\Controllers;

use App\Models\ClientModel;
use App\Models\Clubs;
use App\Models\Fitness;
use App\Models\InstructorModel;
use App\Models\SubscriptionModel;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
       
        return view("pages.home.index",[
            "services"=>Fitness::all()->count(),
            "instructors"=>InstructorModel::all()->count(),
            "clients"=>ClientModel::all()->count(),
            "subscriptions"=>SubscriptionModel::all(),
            "clubs"=>Clubs::all()->count()
        ]);
    }

}
