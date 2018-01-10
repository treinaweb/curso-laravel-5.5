@extends('layouts.app')

@section('content')

  <div class="container">
    @forelse ($clients as $client)
      <p>ID do cliente: {{ $client->id }}</p>
      <p>Nome do cliente: {{ $client->name }}</p>
      <p>Email do Cliente: {{ $client->email }}</p>
      <p>Idade do Cliente: {{ $client->age }}</p>
    @empty
      <p>Nenhum cliente cadastrado</p>
    @endforelse
  </div>
@endsection


