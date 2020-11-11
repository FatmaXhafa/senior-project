<?php

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/exams/create', 'App\Http\Controllers\ExamController@create');
Route::post('/exams', 'App\Http\Controllers\ExamController@store');
Route::get('/exams/{exam}', 'App\Http\Controllers\ExamController@show');

Route::get('/exams/{exam}/questions/create', 'App\Http\Controllers\QuestionController@create');
Route::post('/exams/{exam}/questions', 'App\Http\Controllers\QuestionController@store');
Route::delete('/exams/{exam}/questions/{question}', 'App\Http\Controllers\QuestionController@destroy');

Route::get('/assessments/{exam}-{slug}', 'App\Http\Controllers\AssessmentController@show');
Route::post('/assessments/{exam}-{slug}', 'App\Http\Controllers\AssessmentController@store');