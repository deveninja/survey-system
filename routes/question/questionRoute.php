<?php

use App\Http\Controllers\QuestionnaireQuestionsController;
use Illuminate\Support\Facades\Route;

// GET
Route::get(
    '/questionnaires/{questionnaire}/questions',
    [QuestionnaireQuestionsController::class, 'index']
);

Route::get(
    '/questionnaires/{questionnaire}/questions/create',
    [QuestionnaireQuestionsController::class, 'create']
);

Route::get(
    '/questionnaires/{questionnaire}/questions/{question}',
    [QuestionnaireQuestionsController::class, 'show']
);



// POST
Route::post(
    '/questionnaires/{questionnaire}/questions',
    [QuestionnaireQuestionsController::class, 'store']
);



// DELETE
Route::delete(
    '/questionnaires/{questionnaire}/questions/{question}',
    [QuestionnaireQuestionsController::class, 'destroy']
);
