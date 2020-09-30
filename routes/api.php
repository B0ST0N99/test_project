<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['namespace' => 'Admin', 'middleware' => ['auth.api']], function () {
    Route::apiResource('admin/questionnaires', 'QuestionnaireController')->except(['update', 'destroy']);
});

Route::group(['namespace' => 'User'], function () {
    Route::apiResource('questionnaires', 'QuestionnaireController')->only(['show']);

    Route::apiResource('questionnaire-answers', 'QuestionnaireAnswerController')->only(['store']);
});

