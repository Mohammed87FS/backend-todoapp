<?php

use Illuminate\Support\Facades\Route;

// Place your API routes here
use App\Http\Controllers\TaskController;

Route::apiResource('tasks', TaskController::class);


use App\Http\Controllers\Auth\RegisterController;

Route::apiResource('signup', RegisterController::class);