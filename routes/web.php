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


Route::post('questions/{id}' , 'QuestionController@addAnswer' )->name('questions.addAnswer');
Route::resource('questions', 'QuestionController');



Route::delete('/answers/{answer}', 'AnswerController@destroy')->name('answers.destroy');
Route::patch('/answers/{id}', 'AnswerController@update')->name('answers.update');


Route::resource('users', 'UserController');



Route::get('/', function () {
    return view('welcome');
});


Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();


