<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Lista os clientes do banco
     *
     * @return void
     */
    public function index()
    {
        $clients = \App\Client::get();

        return view('clients.index', compact('clients'));
    }
}
