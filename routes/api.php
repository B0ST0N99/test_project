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

Route::group(
    [
        'namespace'  => 'Admin',
        'middleware' => ['auth.api'],
        'prefix'     => 'admin',
        'as'         => 'admin.'
    ],
    function () {
        Route::apiResource('questionnaires', 'QuestionnaireController')->except(['update', 'destroy']);

        Route::get('statistics/pie-chart', 'StatisticController@pieChart')->name('statistics.pie_chart');
        Route::get('statistics/bar-chart', 'StatisticController@barChart')->name('statistics.bar_chart');
    }
);

Route::group(['namespace' => 'User'], function () {
    Route::apiResource('questionnaires', 'QuestionnaireController')->only(['show']);

    Route::apiResource('questionnaire-answers', 'QuestionnaireAnswerController')->only(['store']);
});

