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

Route::get('/', 'PersonController@index')->name('index');
Route::get('create', 'PersonController@create')->name('create');
Route::post('store', 'PersonController@store')->name('store');
Route::get('show/{person}', 'PersonController@show')->name('show');
Route::get('edit/{person}', 'PersonController@edit')->name('edit');
Route::put('update/{person}', 'PersonController@update')->name('update');
Route::delete('delete/{person}', 'PersonController@destroy')->name('destroy');

Route::resource('ticket', 'TicketController');
