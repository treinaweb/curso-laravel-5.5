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

Route::get('/', function () {
    return view('helpers');
});

Route::redirect('cliente', 'treinaweb/clients', 301);

Route::prefix('treinaweb/clients')->group(function () {
    Route::get('/', 'ClientController@index')->name('clients.list');
    Route::get('create/new', 'ClientController@create');
    Route::any('save', 'ClientController@save')->name('clients.save');
    Route::get('edit/{id}/{name}', 'ClientController@edit')->name('clients.edit');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
