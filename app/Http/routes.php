<?php

use App\Models\Task;
use Illuminate\Http\Request;
use App\Controller\HomeController;
use App\Controller\TaskController;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//Show Task Dashboard
Route::resource('/','TaskController@index');
Route::resource('task/add', 'TaskController@store');
Route::delete('task/{id}', 'TaskController@destroy');
Route::resource('task/edit/{id}', 'TaskController@update');
