@extends('layout')

@section('titulo')
    <h1>Teste de Helpers</h1>
@endsection

@section('conteudo')

  {{ route('clients.edit', ['id' => 20, 'name' => 'Elton']) }}

  <br>

  {{ str_after('Treinaweb cursos', 'Treinaweb') }}

  <br>

  {{ app_path('Http/Controllers/Controller.php') }}

  <br>

  {{ array_random(['Maria', 'João', 'Elton']) }}

@endsection


