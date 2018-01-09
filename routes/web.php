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

Route::redirect('cliente', 'treinaweb/clients', 301);

Route::prefix('treinaweb/clients')->group(function () {
    
    Route::get('/', function () {

        $clients = [];
        $group  = 'Atacado';

        return view('clients.index', compact('clients', 'group'));
    })->name('clients.list');

    Route::get('create/new', function () {
        return view('clients.form');
    });

    Route::any('save', function () {
        return 'Cliente criado com sucesso';
    })->name('clients.save');

    // Route::get('{name}/{age?}', function ($name, $age='nao definido') {
    //     $html = "Detalhes do cliente {$name} ele tem {$age} anos";
    //     $html .= '<br><a href="' . route('clients.list') . '">Lista de clientes</a>';
    //     return $html;
    // })->where(['age' => '[0-9]+', 'name' => '[A-Za-z]+']);
});