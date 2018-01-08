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

Route::get('clients', function () {
    return '<h1>Lista de Cliente</h1>';
})->name('clientes');

Route::get('clients/create/new', function () {
    $html = '<h1>Criar Cliente</h1>';

    $html .= '<br><a href="' . route('clientes') . '">Lista de clientes</a>';

    return $html;

});

Route::get('clients/{name}/{age?}', function ($name, $age='nao definido') {
    $html = "Detalhes do cliente {$name} ele tem {$age} anos";
    
    $html .= '<br><a href="' . route('clientes') . '">Lista de clientes</a>';
    
    return $html;

})->where(['age' => '[0-9]+', 'name' => '[A-Za-z]+']);