<?php

use App\Http\Controllers\Api\AbsensiMatkulController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\KhsController;
use App\Http\Controllers\Api\ScheduleController;
use App\Models\AbsensiMatkul;
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

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::apiResource('schedule', ScheduleController::class);
    Route::apiResource('khs', KhsController::class);
    Route::apiResource('absensi', AbsensiMatkulController::class);


    Route::post('/logout', [AuthController::class, 'logout']);
});

Route::post('/login', [AuthController::class, 'login']);
