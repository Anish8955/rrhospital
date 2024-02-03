<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\LoginRegisterController;




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

Route::get('/', function () {
    return view('welcome');
})->name('welcome');


Route::get('/appointment', function () {
    return view('main.appointment');
})->name('appointment');

Route::controller(AppointmentController::class)->group(function () {
    Route::post('/appointment', 'appointment')->name('appointment');
    Route::get('/allappointment', 'allappointment')->name('allappointment');
    Route::delete('/appointment/{id}/delete', 'deleteappointment')->name('deleteappointment');

});


Route::controller(LoginRegisterController::class)->middleware(['guest', 'preventBackHistory'])->group(function () {

    Route::get('/register', 'register')->name('register');
    Route::post('/register', 'registerPost')->name('register.post');
    Route::get('/login', 'login')->name('login');
    Route::post('/login', 'loginPost')->name('loginpost');

});

Route::controller(AdminController::class)->group(function () {

    Route::get('/adduser', 'adduser')->name('adduser');
    Route::post('/adduser', 'adduserpost')->name('adduserpost');
    Route::get('/listuser', 'listusers')->name('listuser');
    Route::get('/users/{id}/edit', 'edituser')->name('edit');
    Route::put('/users/{id}', 'update')->name('edituserpost');
    Route::delete('/user/{id}/delete', 'deleteuser')->name('delete');
});

Route::prefix('admin')->name('admin.')->middleware(['admin.auth', 'preventBackHistory'])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.index');
    })->name('dashboard');

    
});

Route::get('/logout', [LoginRegisterController::class, 'logout'])->name('logout');

