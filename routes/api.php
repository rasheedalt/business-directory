<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::get('/search/{keyword}', 'BusinessController@search');
Route::get('/count', 'CategoryController@count');
Route::group(['prefix' => 'auth'], function(){
    Route::post('/login', 'AuthController@login');
  });

//Route::group(['middleware' => 'auth:api'], function(){
   
    Route::group(['prefix' => 'category'], function(){
      Route::get('/', 'CategoryController@index');
      Route::delete('/delete/{id}', 'CategoryController@destroy');
    });

    Route::group(['prefix' => 'business'], function(){
          Route::get('/', 'BusinessController@index');
          Route::get('/{id}', 'BusinessController@show');
          Route::post('/create', 'BusinessController@create');
          Route::post('/toggle-active', 'BusinessController@toggleActive');
          Route::post('/edit/{id}', 'BusinessController@edit');
          Route::post('/delete/{id}', 'BusinessController@destroy');
          Route::post('/addCategory', 'BusinessController@addCategory');
    });

   
//});
