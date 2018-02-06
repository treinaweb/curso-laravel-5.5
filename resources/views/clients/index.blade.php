@extends('layouts.app')

@section('titulo-pagina')
    <h1>Lista de clientes</h1>
@endsection

@section('content')
    <div class="row">
      <div class="col-md-12">
        <table class="table table-striped">
          <thead>
            <tr>
              <th>Id</th>
              <th>Nome</th>
              <th>Email</th>
              <th>Ações</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($clients as $client)
              <tr>
                <td>{{ $client->id }}</td>
                <td>
                  <a href="{{ route('clients.show', $client->id) }}">
                    {{ $client->name }}
                  </a>
                </td>
                <td>{{ $client->email }}</td>
                <td>
                  @can('update-client', $client)
                    <a class="btn btn-success"  href="{{ route('clients.edit', $client->id) }}">Editar</a>

                    <form style="display: inline" action="{{ route('clients.destroy', $client->id) }}" method="post">
                      {{ csrf_field() }}
                      {{ method_field('DELETE') }}

                      <button type="submit" class="btn btn-danger" 
                          onclick="return confirm('Tem certeza que deseja remover o cliente?')">Deletar</button>
                    </form>
                  @endcan  
                </td>
              </tr>
            @empty
              <tr><td>Nenhum cliente cadastrado</td></tr>
            @endforelse
          </tbody>
        </table>

        <div class="row text-center">
          {{ $clients->links() }}
        </div>

        <a href="{{ route('clients.create') }}">Criar Cliente</a> -
        <a href="{{ url('clients/pdf') }}">Baixar lista em PDF</a>
      </div>
    </div>
@endsection


