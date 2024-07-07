<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminAPI;
use App\Http\Controllers\UserAPI;
use App\Http\Controllers\InputTempController;
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

// User Function Routes
Route::prefix('auth')->group(function () {
    Route::post('/signup', [UserAPI::class, 'signup']);
    Route::post('/login', [UserAPI::class, 'login']);
});

// Admin Functions Routes
Route::middleware('auth:sanctum')->group(function () {
    Route::patch('/users/{id}', [AdminAPI::class, 'update']);
    Route::delete('/user/{id}', [AdminAPI::class, 'destroy']);
    Route::post('/logout', [AdminAPI::class, 'logout']);
});

Route::post('/templates', [InputTempController::class, 'store']);
Route::get('/templates', [InputTempController::class, 'index']);
Route::get('/templates/{id}', [InputTempController::class, 'show']);
        