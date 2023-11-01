<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\DatadiriController;

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

Route::get('/soal2', function () {
    return view('welcome');
});
Route::get('/', function () {
    return view('welcome2');
});
Route::get('/soal1', function () {
    return view('soal1');
});

Route::get('/soal4', [TestController::class, 'index']);
Route::get('/soal3', [DatadiriController::class, 'tampildata'])->middleware('auth');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
