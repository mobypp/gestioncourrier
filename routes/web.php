<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CourrierController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\DivisionController;
use App\Http\Controllers\ServiceController;


Auth::routes();

// Route::middleware('auth')->group(function (){

Route::get('/', [HomeController::class , 'index'])->name('app');
// User
Route::resource('user', 'UserController');
//Role
Route::resource('role', 'RoleController');
// Courrier 
Route::resource('courrier', 'CourrierController');
// organisme
Route::resource('organisme', 'OrganismeController');
//divisions
Route::resource('division', 'DivisionController');
// service
Route::resource('service', 'ServiceController');

Auth::routes(['register' => false]);

Route::get('/notification',function() {
    return view('app.notification.index');
})->name('notification');

// php artisan make:Controller CourrierController
// php artisan make:migration add_column_service_id_users --table= users
// php artisan make:migration create_users_table
//Notification
Route::get('/notif', [NotificationController::class , 'show'])->name('notif');

Route::get('send', [HomeController::class,'sendNotification']);
// }
//--Route::get('/profile',function() {
    //return view('app.profile.index');
//})->name('profile');
Route::get('/profile', [App\Http\Controllers\ProfileController::class , 'index'])->name('profile');
Route::get('editP',[App\Http\Controllers\ProfileController::class,'edit'])->name('profile.edit');
