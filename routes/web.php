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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'PpmpsController@index');
Route::get('/apps', 'AppsController@index');
Route::post('/consolidated', 'PpmpsController@store');
// Route::get('/ppmps', 'PpmpsController@index');

Route::resource('apps', 'AppsController');
Route::resource('ppmps', 'PpmpsController');
Route::any('/search', 'AppsController@search');