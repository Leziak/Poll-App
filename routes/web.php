<?php

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

Route::get('/polls', 'PollController@index');

Route::get("/polls/create", "PollController@create");

Route::get("/polls/edit/{id?}", "PollController@edit");

Route::post("/polls", "PollController@store");

Route::get("/polls/{id}", "PollController@show");

Route::get("/manage/polls/{id?}", "PollController@manage")->name("poll manager")->middleware("auth");

Route::post('/polls/vote', 'PollController@vote');


Route::post("/polls/{id}", "PollController@update");

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

