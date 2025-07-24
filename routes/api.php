<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API;
use Illuminate\Http\Request;

Route::post('login', [API\UserController::class, 'login']);
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('callnext', [API\CallController::class, 'callNext'])->name('call_next_mobile');
    Route::get('dashboard', [API\DashboardController::class, 'dashboard']);
    Route::post('logout', [API\UserController::class, 'logout']);
    Route::post('set-service-and-counter', [API\CallController::class, 'setServiceApiCounter']);
    Route::post('get-tokens', [API\CallController::class, 'getTokensForCall']);
    Route::post('call/no-show', [API\CallController::class, 'noShowApiToken']);
    Route::post('call/recall-token', [API\CallController::class, 'recallApiToken']);
    Route::post('serve-token', [API\CallController::class, 'serveApiToken']);
});
Route::get('services-counters', [API\DashboardController::class, 'servicesAndCounters']);
