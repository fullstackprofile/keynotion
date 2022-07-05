<?php

use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\NewsController;
use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\Api\TicketController;
use App\Http\Controllers\Api\VacancyController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\EventController;


Route::get('/', function () {
    return 'Its API';
});


Route::apiResources(['events' => EventController::class]);
Route::apiResources(['tickets' => TicketController::class]);
Route::apiResources(['vacancies' => VacancyController::class]);
Route::apiResources(['news' => NewsController::class]);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/profile', [ProfileController::class, 'index']);
});

Route::middleware('guest')->group(function () {
    Route::post('/register', [AuthController::class, 'storeRegister']);
    Route::post('/login', [AuthController::class, 'storeLogin']);
});
