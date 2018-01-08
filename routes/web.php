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
    return view('welcome');
});

Route::prefix('treinaweb/clients')->group(function () {
    
    Route::get('/', function () {
        return '<h1>Lista de Cliente</h1>';
    })->name('clients.list');

    Route::get('create/new', function () {
        $html = '<h1>Criar Cliente</h1>';

        $html .= '<br><a href="' . route('clients.list') . '">Lista de clientes</a>';

        return $html;

    });

    Route::get('{name}/{age?}', function ($name, $age='nao definido') {
        $html = "Detalhes do cliente {$name} ele tem {$age} anos";
        
        $html .= '<br><a href="' . route('clients.list') . '">Lista de clientes</a>';
        
        return $html;

    })->where(['age' => '[0-9]+', 'name' => '[A-Za-z]+']);
});