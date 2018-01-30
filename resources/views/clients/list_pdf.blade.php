@extends('layouts.pdf')

@section('content')
<table class="table table-striped">
    <thead>
      <tr>
        <th>Id</th>
        <th>Nome</th>
        <th>Email</th>
        <th>Idade</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($clients as $client)
        <tr>
          <td>{{ $client->id }}</td>
          <td>{{ $client->name }}</td>
          <td>{{ $client->email }}</td>
          <td>{{ $client->age }}</td>
        </tr>
      @empty
        <tr><td>Nenhum cliente cadastrado</td></tr>
      @endforelse
    </tbody>
  </table>

@endsection