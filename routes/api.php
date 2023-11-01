<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DatadiriController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/datadiris', [DatadiriController::class, 'index']);
Route::get('/datadiris/{id}', [DatadiriController::class, 'show']);
Route::post('/datadiris', [DatadiriController::class, 'store']);
Route::put('/datadiris/{id}', [DatadiriController::class, 'update']);
Route::delete('/datadiris/{id}', [DatadiriController::class, 'destroy']);

