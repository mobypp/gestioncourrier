<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CourrierController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;

// php artisan make:Controller CourrierController


Route::get('/home', [CourrierController::class , 'home'])->name('Home');

Route::get('/', [HomeController::class , 'index'])->name('app');
Route::get('courrier', [CourrierController::class , 'index'])->name('courrier');
Route::get('/user', [UserController::class , 'index'])->name('user');
Route::get('/role', [RoleController::class , 'index'])->name('role');



// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');


Auth::routes();
// $user = Auth::user();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
