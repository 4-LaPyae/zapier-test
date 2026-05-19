<?php

use App\Http\Controllers\QueueTestController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;

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

Route::post('zapier/callback/{event_id}/{api_collection_name}', [TestController::class, 'testWebhookCallback']);
Route::get('/test', [TestController::class, 'index']);
Route::post('/queue-test/email', [QueueTestController::class, 'sendQueuedEmail']);
Route::post('/queue-test/zapier', [QueueTestController::class, 'sendZapierWebhook']);

