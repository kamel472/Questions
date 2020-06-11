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
Route::patch('questions/updateAnswer/{id}' , 'QuestionController@updateAnswer' )->name('questions.updateAnswer');
Route::post('questions/addAnswer/{id}' , 'QuestionController@addAnswer' )->name('questions.addAnswer');







Route::delete('/answers/{answer}', 'AnswerController@destroy')->name('answers.destroy');
Route::patch('/answers/{id}', 'AnswerController@update')->name('answers.update');
Route::patch('/answers/{answer}', 'AnswerController@approve')->name('answers.approve');
Route::post('answers/{id}' , 'AnswerController@addComment' )->name('answers.addComment');
Route::patch('answers/{id}' , 'AnswerController@updateComment' )->name('answers.updateComment');






Route::delete('/comments/{comment}', 'CommentController@destroy')->name('comments.destroy');

Route::post('/like', 'AnswerController@postLike')->name('like');






Route::resource('users', 'UserController');



Route::get('/', function () {
    return view('welcome');
});


Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();


