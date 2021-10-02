<?php

use App\Http\Controllers\SurveyController;
use Illuminate\Support\Facades\Route;

// GET
Route::get(
    '/surveys',
    [SurveyController::class, 'index']
);

Route::get(
    '/surveys/{questionnaire}/create',
    [SurveyController::class, 'create']
);

Route::get(
    '/surveys/{questionnaire}-{slug}',
    [SurveyController::class, 'show']
);



// POST
Route::post(
    '/surveys/{questionnaire}',
    [SurveyController::class, 'store']
);
