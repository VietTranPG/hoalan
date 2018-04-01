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

Route::get('/','ClientController@Home');
Route::get('/detail/{id}','ClientController@Detail');
Route::group(['prefix'=>'category'],function(){    
    Route::get('/','CategoryController@getAll');
    Route::post('/add','CategoryController@add');
    Route::post('/update','CategoryController@update');
    Route::post('/delete','CategoryController@delete');
});
Route::group(['prefix'=>'news'],function(){    
    Route::get('/','NewsController@getAll');
    Route::post('/add','NewsController@add');
    Route::post('/update','NewsController@update');
    Route::post('/delete','NewsController@delete');
});
Route::group(['prefix'=>'product'],function(){    
    Route::get('/','ProductController@getAll');
    Route::post('/add','ProductController@add');
    Route::post('/update','ProductController@update');
    Route::post('/delete','ProductController@delete');
});
Route::get('/login', function () {
    return view('admin.modules.login');
});
