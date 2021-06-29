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

Route::get('notifications', [NotificationController::class , 'index'])->name('app.notifications');
Route::get('notifications/{id}/{ide}', [NotificationController::class , 'show'])->name('app.notifications.show');
Route::post('enregistrer', [CourrierController::class , 'enregistrer'])->name('enregistrer');
Route::put('accepter', [CourrierController::class , 'accepter'])->name('accepter');
Route::put('valider', [CourrierController::class , 'valider'])->name('valider');
Route::put('finish', [CourrierController::class , 'finish'])->name('finish');
// Courrier et organisme

Route::resource('courrier', 'CourrierController');
Route::resource('organisme', 'OrganismeController');
Route::resource('file', 'FileController');

Route::get('/another_file/{id}/','FileController@AnotherFile')->name('file.anotherFile');
Route::get('/final/{id}/','FileController@Continue')->name('file.final');


// Route::get('/notification',function() {
//     return view('app.notification.index');
// })->name('notification');

// php artisan make:Controller CourrierController
// php artisan make:migration add_column_service_id_users --table= users
// php artisan make:migration create_users_table
// php artisan make:policy CourrierPolicy
//Notification
// Route::get('/notif', [NotificationController::class , 'show'])->name('notif');

Route::get('send', [HomeController::class,'sendNotification']);
// }
//--Route::get('/profile',function() {
    //return view('app.profile.index');
//})->name('profile');
Route::get('/profile', [App\Http\Controllers\ProfileController::class , 'index'])->name('profile');
Route::post('/update',[App\Http\Controllers\ProfileController::class,'update'])->name('update.profile');
