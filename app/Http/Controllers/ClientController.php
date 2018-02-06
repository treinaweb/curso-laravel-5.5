<?php

namespace App\Http\Controllers;

use Auth;
use Gate;
use Validator;
use App\Client;
use App\Services\Treinaweb;
use Illuminate\Http\Request;
use App\Http\Requests\ClientRequest;
use Illuminate\Contracts\Validation\Factory;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        var_dump(session('todotasks'));

        $clients = Client::paginate(5);

        return view('clients.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('clients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\ClientRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClientRequest $request)
    {
        $data = $request->all();
        $data['user_id'] = Auth::User()->id;
        $data['photo'] = $request->photo->store('public');
        
        if (Client::create($data)) {
            $request->session()->flash('success', 'Cliente cadastrado com sucesso!');
        } else {
            $request->session()->flash('error', 'Erro ao cadastrar cliente');
        }
        
        return redirect()->route('clients.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  Client $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        return view('clients.show', compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Client $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        $this->authorize('update-client', $client);

        return view('clients.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Client $client
     * @return \Illuminate\Http\Response
     */
    public function update(Factory $validator, Request $request, Client $client)
    {
        $validator->make($request->all(), [
            'name' => ['required', 'max:100', 'min:3'],
            'email' => ['required', 'email', 'unique:clients'],
            'age' => ['required', 'integer'],
            'photo' => ['mimes:jpeg,bmp,png']
        ])->validate();

        $this->authorize('update-client', $client);

        $data = $request->all();

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->photo->store('public');
        }

        if ($client->update($data)) {
            $request->session()->flash('success', 'Cliente atualizado com sucesso!');
        } else {
            $request->session()->flash('error', 'Erro ao atualizar cliente');
        }
        
        return redirect()->route('clients.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Client $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client, Request $request)
    {
        $this->authorize('update-client', $client);

        if ($client->delete()) {
            $request->session()->flash('success', 'Cliente deletado com sucesso!');
        } else {
            $request->session()->flash('error', 'Erro ao deletar cliente');
        }

        return redirect()->route('clients.index');
    }
}
