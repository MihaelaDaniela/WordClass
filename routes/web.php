<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\ClubsController;
use App\Http\Controllers\FitnessController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InstructorController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\SubscriptionController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [GuestController::class, "welcome"]);

Route::group(['middleware' => 'auth'], function(){

    Route::group(['prefix' => 'home'],function (){
        Route::get('/', [HomeController::class,'index'])->name('get-homepage');

        Route::get('/profile',[SettingsController::class,'index'])->name('get-user-profile');
        Route::get('/settings',[SettingsController::class, 'edit'])->name('edit-user');
        Route::put('/{user}',[SettingsController::class,'update'])->name('update-profile');
        Route:Route::post('/upload',[SettingsController::class,'uploadFile'])->name('upload-file');
        });

        
    Route::group(['prefix' => 'fitness'],function (){
        Route::get('/', [FitnessController::class,'index'])->name('get-fitness');
        Route:: post('/', [FitnessController::class, 'store'])->name('store-fitness');

        Route:: get('/add', [FitnessController::class, 'add'])-> name('add-fitness');
        Route::get('/{fitness}',[FitnessController::class,'view'])->name('view-fitness');

        Route::get('/edit/{fitness}',[FitnessController::class,'edit'])->name('edit-fitness');
        Route::put('/edit/{fitness}',[FitnessController::class,'update'])->name('update-fitness');

        Route::delete('/{fitness}',[FitnessController::class,'destroy'])->name('delete-fitness');
        Route::post('/search',[FitnessController::class,'search'])->name('search-fitness');

    });

    Route::group(["prefix" => "instructor"], function(){
        Route:: get('/', [InstructorController::class, 'index'])-> name('get-instructor');
        Route:: post('/', [InstructorController::class, 'store'])->name('store-instructor');

        Route:: get('/add', [InstructorController::class, 'add'])-> name('add-instructor');
        Route::delete('/{instructor}',[InstructorController::class,'destroy'])->name('delete-instructor');

        Route::get('/{instructor}',[InstructorController::class,'view'])->name('view-instructor');
        Route::get('/edit/{instructor}',[InstructorController::class,'edit'])->name('edit-instructor');

        Route::put('/edit/{instructor}',[InstructorController::class,'update'])->name('update-instructor');
    });

    Route::group(["prefix"=> "subscription"], function(){
        Route::get('/', [SubscriptionController::class, 'index'])->name('get-subscription');
        Route:: post('/', [SubscriptionController::class, 'store'])->name('store-subscription');
        Route:: get('/add', [SubscriptionController::class, 'add'])-> name('add-subscription');

        Route::delete('/{subscription}',[SubscriptionController::class,'destroy'])->name('delete-subscription');
        Route::get('/{subscription}',[SubscriptionController::class,'view'])->name('view-subscription');
        
        Route::get('/edit/{subscription}',[SubscriptionController::class,'edit'])->name('edit-subscription');
        Route::put('/edit/{subscription}',[SubscriptionController::class,'update'])->name('update-subscription');
    

    
    });

    Route::group(["prefix"=> "client"], function(){
        Route::get('/', [ClientController::class, 'index'])->name('get-clients');
        Route::post('/search',[ClientController::class,'search'])->name('search-client');

        Route:: post('/', [ClientController::class, 'store'])->name('store-client');
        Route:: get('/add', [ClientController::class, 'add'])-> name('add-client-subscription');

        Route::delete('/{client}',[ClientController::class, 'destroy'])->name('delete-client');
        Route::get('/{client}',[ClientController::class,'view'])->name('view-client');

        Route::get('/edit/{client}',[ClientController::class,'edit'])->name('edit-client');
        Route::put('/edit/{client}',[ClientController::class,'update'])->name('update-client');

    });

    Route::group(["prefix"=>"clubs"], function(){

        
        Route::get('/', [ClubsController::class,'index'])->name('get-clubs');
        Route::post('/', [ClubsController::class,'store'])->name('store-club');
        Route::get('/add', [ClubsController::class,'add'])->name('add-club');

        
        
        Route::delete('/{club}', [ClubsController::class,'destroy'])->name('delete-club');

        
        Route::get('/edit/{club}', [ClubsController::class,'edit'])->name('edit-club');
        Route::put('/edit/{club}', [ClubsController::class,'update'])->name('update-club');
        
    });
});

require __DIR__.'/auth.php';
