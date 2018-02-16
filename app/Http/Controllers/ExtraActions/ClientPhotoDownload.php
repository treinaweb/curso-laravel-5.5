<?php

namespace App\Http\Controllers\ExtraActions;

use App\Client;
use App\Http\Controllers\Controller;

class ClientPhotoDownload extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @return Response
     */
    public function __invoke(Client $client)
    {
        return response()->download(
        storage_path('app/' . $client->photo)
      );
    }
}
