<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CourrierController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;

// php artisan make:Controller CourrierController


// Route::get('/home', [CourrierController::class , 'home'])->name('Home');

Route::get('/home', [HomeController::class , 'index'])->name('app');
Route::get('courrier', [CourrierController::class , 'index'])->name('courrier');

Route::get('/user', [UserController::class , 'index'])->name('user');
Route::get('/role', [RoleController::class , 'index'])->name('role');

//division
Route::get('/division', [App\Http\Controllers\DivisionController::class , 'index'])->name('division');
Route::get('/createDivision',[App\Http\Controllers\DivisionController::class,'create']);
 Route::post('division',[App\Http\Controllers\DivisionController::class,'store']);

 Route::get('editD/{id}',[App\Http\Controllers\DivisionController::class,'edit']);

Route::post('/updateD',[App\Http\Controllers\DivisionController::class,'update'])->name('update.division');

//service
Route::get('/service',[App\Http\Controllers\ServiceController::class,'index'])->name('service');
Route::get('/createService',[App\Http\Controllers\ServiceController::class,'create']);
Route::post('/service',[App\Http\Controllers\ServiceController::class,'store']);

Route::get('edit/{id}',[App\Http\Controllers\ServiceController::class,'edit']);
 Route::post('/update',[App\Http\Controllers\ServiceController::class,'update'])->name('update.service');

 Route::get('/delete-service/{id}' , [App\Http\Controllers\ServiceController::class,'delete']);


// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Auth::routes(['register' => false]);
// Auth::routes();
// $user = Auth::user();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
