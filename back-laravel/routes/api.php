<?php

use App\Http\Controllers\QuizController;
use Illuminate\Support\Facades\Route;

Route::apiResource("quiz", QuizController::class);
