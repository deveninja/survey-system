<?php

use App\Http\Controllers\QuestionnaireController;
use Illuminate\Support\Facades\Route;

// GET
Route::get(
    '/questionnaires',
    [QuestionnaireController::class, 'index']
);

Route::get(
    '/questionnaires/create',
    [QuestionnaireController::class, 'create']
);

Route::get(
    '/questionnaires/{questionnaire}',
    [QuestionnaireController::class, 'show']
);



// POST
Route::post(
    '/questionnaires',
    [QuestionnaireController::class, 'store']
);
