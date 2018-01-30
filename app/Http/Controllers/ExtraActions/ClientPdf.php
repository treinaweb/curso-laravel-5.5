<?php

namespace App\Http\Controllers\ExtraActions;

use PDF;
use App\Client;
use App\Http\Controllers\Controller;

class ClientPdf extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @return Response
     */
    public function __invoke()
    {
      $clients = Client::get();

      $pdf = PDF::loadView('clients.list_pdf', compact('clients'));

      return $pdf->download('lista-de-clientes.pdf');
    }
}