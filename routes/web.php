<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SendEmailController;


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
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/datatble', [App\Http\Controllers\HomeController::class, 'simpleDataTable'])->name('datatble');
Route::get('/yajraDataTable', [App\Http\Controllers\HomeController::class, 'showYajraDataTable'])->name('yajraDataTable');
Route::post('/yajraDataTablelist', [App\Http\Controllers\HomeController::class, 'getUserData'])->name('yajraDataTablelist');
Route::get('/updateUserForm', [App\Http\Controllers\HomeController::class, 'updateUserForm'])->name('updateUserForm');
Route::post('/updateUser', [App\Http\Controllers\HomeController::class, 'updateUser'])->name('updateUser');
Route::get('/deleteUser', [App\Http\Controllers\HomeController::class, 'deleteUser'])->name('deleteUser');
Route::get('/send-mail', [SendEmailController::class, 'index']);
Route::get('/observerCreate', [SendEmailController::class, 'observerCreate']);
Route::get('/observerdelete', [SendEmailController::class, 'observerdelete']);
