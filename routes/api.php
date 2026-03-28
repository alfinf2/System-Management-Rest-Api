<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ClassesController;
use App\Http\Controllers\Api\ScoreController;
use App\Http\Controllers\Api\SemesterController;
use App\Http\Controllers\Api\StudentController;
use App\Http\Controllers\Api\SubjectController;
use Illuminate\Support\Facades\Route;

Route::post('/register',[AuthController::class,'register']);
Route::post('/login',[AuthController::class,'login']);

Route::middleware('auth:sanctum')->group(function(){

    Route::get('/me',[AuthController::class,'me']);

    Route::apiResource('students',StudentController::class);

    Route::apiResource('classes', ClassesController::class);

    Route::apiResource('subject', SubjectController::class);

    Route::apiResource('semester',SemesterController::class);

    Route::apiResource('score',ScoreController::class);

    Route::post('/logout',[AuthController::class,'logout']);

});