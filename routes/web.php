<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CourrierController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\NotificationController;


// php artisan make:Controller CourrierController
// php artisan make:migration add_column_service_id_users --table= users
// php artisan make:migration create_users_table

Route::get('/', [HomeController::class , 'index'])->name('app');
// User
Route::resource('user', 'UserController');
//Role
Route::resource('role', 'RoleController');
//Notification
Route::get('/notif', [NotificationController::class , 'show'])->name('notif');

Route::get('send', [HomeController::class,'sendNotification']);

//divisions
Route::get('/division', [App\Http\Controllers\DivisionController::class , 'index'])->name('division');
//ajouter division
Route::get('/createDivision',[App\Http\Controllers\DivisionController::class,'create'])->name('division.create');
 Route::post('division',[App\Http\Controllers\DivisionController::class,'store'])->name('storeD');
//modifier division
 Route::get('editD/{id}',[App\Http\Controllers\DivisionController::class,'edit'])->name('division.edit');

Route::put('/updateD/{id}',[App\Http\Controllers\DivisionController::class,'update'])->name('update.division');
Route::get('/delete-divsion/{id}' , [App\Http\Controllers\DivisionController::class,'delete'])->name('division.delete');
//services
Route::get('/service',[App\Http\Controllers\ServiceController::class,'index'])->name('service');
//ajouter service
Route::get('/createService',[App\Http\Controllers\ServiceController::class,'create']);
Route::post('/service',[App\Http\Controllers\ServiceController::class,'store'])->name('storeS');
//modifier service
Route::get('edit/{id}',[App\Http\Controllers\ServiceController::class,'edit'])->name('service.edit');
 Route::put('/updateS{id}',[App\Http\Controllers\ServiceController::class,'update'])->name('update.service');
//supprimer service 
 Route::get('/delete-service/{id}' , [App\Http\Controllers\ServiceController::class,'delete'])->name('service.delete');


Auth::routes(['register' => false]);

// Courrier et organisme

Route::resource('courrier', 'CourrierController');
Route::post('/create/courrier/{id}/','CourrierController@storeN')->name('courrier.storeN');

Route::resource('organisme', 'OrganismeController');


Route::resource('file', 'FileController');
Route::get('/another_file/{id}/','FileController@AnotherFile')->name('file.anotherFile');



Route::get('/notification',function() {
    return view('app.notification.index');
})->name('notification');

//--Route::get('/profile',function() {
    //return view('app.profile.index');
//})->name('profile');
Route::get('/profile', [App\Http\Controllers\ProfileController::class , 'index'])->name('profile');
Route::post('/update',[App\Http\Controllers\ProfileController::class,'update'])->name('update.profile');