<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EventController;




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

Auth::routes();

Route::get('/event', [App\Http\Controllers\EventController::class, 'index']);
Route::get('/event/show', [App\Http\Controllers\EventController::class, 'show']);



Route::post('/event/add', [App\Http\Controllers\EventController::class, 'store']);
Route::post('/event/edit/{id}', [App\Http\Controllers\EventController::class, 'edit']);
Route::post('/event/update/{event}', [App\Http\Controllers\EventController::class, 'update']);

Route::post('/event/delete/{id}', [App\Http\Controllers\EventController::class, 'delete']);



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



