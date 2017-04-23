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

use App\Wine;
use App\Country;
use App\Grape;
use App\Type;

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/winelist', 'WineController@index');

Route::get('/winelist/results', 'WineController@search');

Route::get('/winelist/add', 'WineController@add');

Route::post('/winelist/results', 'WineController@create');

Route::get('winelist/{id}/delete', 'WineController@destroy');

Route::get('/winelist/{id}', 'WineController@view');

Route::post('/winelist/{id}', 'WineController@update');




