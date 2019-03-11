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

Route::get('/', [
		'uses' => 'TasksController@index',
		'as' => 'tasks.index'
	]);

Route::get('tasks',[
		'uses' => 'TasksController@index',
		'as' => 'tasks.index'
	]);
Route::get('tasks/create',[
		'uses' => 'TasksController@create',
		'as' => 'tasks.create'
	]);
Route::post('tasks',[
		'uses' => 'TasksController@store',
		'as' => 'tasks.store'
	]);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
