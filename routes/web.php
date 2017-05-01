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

//DB::listen(function ($query) {
//    var_dump($query->sql);
//});

Route::get('/', 'LoginController@index');
Route::post('/', 'LoginController@login');

Route::get('/signup', 'SignupController@index');
Route::post('/signup', 'SignupController@signup');


Route::get('/winelist', 'WineController@index')->middleware('protected');

Route::get('/logout', 'LoginController@logout');

Route::get('/user', function() {
    return Auth::user();
});

Route::get('/winelist', 'WineController@index');

Route::get('/winelist/results', 'WineController@search');
Route::get('/winelist/favorites', 'WineController@favorites');
Route::get('/winelist/add', 'WineController@add');

Route::post('/winelist/results', 'WineController@create');

Route::get('winelist/{id}/delete', 'WineController@destroy');

Route::get('/winelist/{id}', 'WineController@view');

Route::post('/winelist/{id}', 'WineController@update');

Route::get('/winelist/{id}/favorite', 'WineController@addtolist');
Route::get('/winelist/{id}/remove', 'WineController@removefromlist');




