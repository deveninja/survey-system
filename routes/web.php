<?php

use App\Http\Controllers\QuestionnaireController;
use App\Http\Controllers\QuestionnaireQuestionsController;
use App\Http\Controllers\SurveyController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('/questionnaires');
});

Route::resource('questionnaires', QuestionnaireController::class)
    ->middleware(['auth']);

Route::resource('questionnaires.questions', QuestionnaireQuestionsController::class)
    ->middleware(['auth']);

Route::get('/surveys/{questionnaire}-{slug}', [SurveyController::class, 'show']);
Route::post('/surveys/{questionnaire}-{slug}', [SurveyController::class, 'store']);

require __DIR__ . '/auth.php';

Auth::routes();
