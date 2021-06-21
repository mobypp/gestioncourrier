<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CourrierController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;

// php artisan make:Controller CourrierController


// Route::get('/', 'HomeController@dashboard')->name('app.dashboard');

Route::get('/', [HomeController::class , 'index'])->name('app');
Route::get('/courrier', [CourrierController::class , 'index'])->name('courrier');
Route::get('/user', [UserController::class , 'index'])->name('user');
Route::get('/createU', [UserController::class , 'create'])->name('createU');
Route::post('/storeU', [UserController::class , 'store'])->name('storeU');
Route::get('/edit/{id}', [UserController::class , 'edit'])->name('user.edit');
Route::put('/update/{id}', [UserController::class , 'update'])->name('user.update');

Route::get('/role', [RoleController::class , 'index'])->name('role');
Route::get('/create', [RoleController::class , 'create'])->name('create');
Route::post('/store', [RoleController::class , 'store'])->name('store');
Route::put('/edit/{id}', [RoleController::class , 'update'])->name('edit');

Auth::routes(['register' => true]);
// Auth::routes();
// $user = Auth::user();