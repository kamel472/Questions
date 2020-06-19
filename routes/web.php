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



Route::resource('questions', 'QuestionController');

Route::prefix('answers')->group(function () {

        Route::post('/{id}', 'AnswerController@store')->name('answers.store');
        Route::delete('/{answer}', 'AnswerController@destroy')->name('answers.destroy');
        Route::patch('/{answer}', 'AnswerController@approve')->name('answers.approve');
        Route::patch('/{answer}', 'AnswerController@update')->name('answers.update');
});

Route::prefix('comments')->group(function () {

        Route::post('/{id}', 'CommentController@store')->name('comments.store');
        Route::patch('/{id}', 'CommentController@update')->name('comments.update');
        Route::delete('/{comment}', 'CommentController@destroy')->name('comments.destroy');
});

Route::POST('rating', 'RatingController@create')->name('rating');

Route::resource('users', 'UserController');

Route::get('/', function () {
    return view('home');
});

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();
