<?php

use App\Http\Middleware\CheckTasks;

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

Route::group(['middleware' => ['alerttasks', 'auth']], function() {

    Route::get('/', function () {
        return view('helpers');
    });
    
    Route::get('clients/pdf', 'ExtraActions\ClientPdf');
    Route::resource('clients', 'ClientController');
    
    Route::resource('projects', 'projectController');

    Route::get('tasks/add/{id}', 'ToDoTasksController@store');
    Route::get('tasks/delete/{id}', 'ToDoTasksController@destroy')->middleware(CheckTasks::class);

});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
