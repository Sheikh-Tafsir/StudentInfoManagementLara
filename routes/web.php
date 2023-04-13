<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\AddController;
use App\Http\Controllers\UpdateController;
use App\Http\Controllers\DeleteController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/logout', function () {
    return view('logout');
})->name('logout');

Route::get('/addstudent', function () {
    return view('addstudent');
})->name('addstudent');

Route::get('/updatestudent', function () {
    return view('updatestudent');
})->name('updatestudent');

Route::get('/deletestudent', function () {
    return view('deletestudent');
})->name('deletestudent');

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::post('/api/login',[LoginController::class,'login']);
Route::post('/api/logout',[LogoutController::class,'logout']);
Route::post('/api/add',[AddController::class,'add']);
Route::post('/api/update',[UpdateController::class,'update']);
Route::post('/api/delete',[DeleteController::class,'delete']);
