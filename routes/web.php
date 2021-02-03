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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function() {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {
        Route::get('/datos-persona/create', 'PersonController@create')->name('create.user');
        Route::post('/datos-persona/store', 'PersonController@store')->name('store.user');
        Route::get('/datos-persona/{person}/edit', 'PersonController@edit')->name('edit.user');
        Route::post('/datos-persona/{person}/update', 'PersonController@update')->name('update.user');
        Route::post('/datos-persona/{person}/delete', 'PersonController@destroy')->name('delete.user');
    });
});
