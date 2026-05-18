<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/test', [App\Http\Controllers\TestController::class, 'index']);
Route::post('/test', [App\Http\Controllers\TestController::class, 'createPost']);

Route::get('/me', [App\Http\Controllers\ZapierController::class, 'me']);
Route::prefix('zapier')->middleware('auth:sanctum')->group(function () {
    Route::get('/fields', [App\Http\Controllers\ZapierController::class, 'getFields']);
    Route::get('/entrants', [App\Http\Controllers\ZapierController::class, 'getEntrants']);
});

