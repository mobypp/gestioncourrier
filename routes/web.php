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

// Route::get('/home', [HomeController::class , 'index'])->name('app');
// Route::get('courrier', [CourrierController::class , 'index'])->name('courrier');
// User
Route::get('/user', [UserController::class , 'index'])->name('user');
Route::get('/createU', [UserController::class , 'create'])->name('createU');
Route::post('/storeU', [UserController::class , 'store'])->name('storeU');
Route::get('/edit/{id}', [UserController::class , 'edit'])->name('user.edit');
Route::put('/update/{id}', [UserController::class , 'update'])->name('user.update');
Route::put('/delete/{id}', [UserController::class , 'delete'])->name('user.delete');
// Route::get('/user', [UserController::class , 'index'])->name('user');
//Role
// Route::get('/role', [RoleController::class , 'index'])->name('role');
Route::get('/role', [RoleController::class , 'index'])->name('role');
Route::get('/create', [RoleController::class , 'create'])->name('create');
Route::post('/store', [RoleController::class , 'store'])->name('store');
Route::put('/edit/{id}', [RoleController::class , 'update'])->name('edit');


//divisions
Route::get('/division', [App\Http\Controllers\DivisionController::class , 'index'])->name('division');
//ajouter division
Route::get('/createDivision',[App\Http\Controllers\DivisionController::class,'create']);
 Route::post('division',[App\Http\Controllers\DivisionController::class,'store']);
//modifier division
 Route::get('editD/{id}',[App\Http\Controllers\DivisionController::class,'edit']);

Route::post('/updateD',[App\Http\Controllers\DivisionController::class,'update'])->name('update.division');

//services
Route::get('/service',[App\Http\Controllers\ServiceController::class,'index'])->name('service');
//ajouter service
Route::get('/createService',[App\Http\Controllers\ServiceController::class,'create']);
Route::post('/service',[App\Http\Controllers\ServiceController::class,'store']);
//modifier service
Route::get('edit/{id}',[App\Http\Controllers\ServiceController::class,'edit']);
 Route::post('/update',[App\Http\Controllers\ServiceController::class,'update'])->name('update.service');
//supprimer service 
 Route::get('/delete-service/{id}' , [App\Http\Controllers\ServiceController::class,'delete']);

  //modal ma3reftch lih :) 
 //hadak divsion ba9i kaytafficah gha l id 


// Auth::routes();



Auth::routes(['register' => true]);
// Auth::routes();
// $user = Auth::user();


// Courrier et organisme

Route::resource('courrier', 'CourrierController');
Route::resource('organisme', 'OrganismeController');