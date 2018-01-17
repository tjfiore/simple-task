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
Route::get('/', function(){
  return redirect('/tasks');
});

Route::post('login', 'LoginController@getLogin');

Route::group(['middleware'=>'auth'], function(){

  Route::resource('/tasks','TaskController@index');
  Route::resource('task/add', 'TaskController@store');
  Route::put('task/edit/{id}', 'TaskController@update');
  Route::delete('task/{id}', 'TaskController@destroy');
});
