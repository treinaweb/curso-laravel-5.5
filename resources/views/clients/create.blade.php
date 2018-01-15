@extends('layouts.app')

@section('titulo-pagina')
    <h1>Novo cliente</h1>
@endsection

@section('content')
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
          <form class="form-horizontal" method="post" enctype="multipart/form-data" action="{{ route('clients.store') }}">
              {{ csrf_field() }}

              @include('clients.form')
            </form>

        <a href="{{ route('clients.index') }}">Volta para a lista de clientes</a>
      </div>
    </div>
@endsection

