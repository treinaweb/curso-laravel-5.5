@extends('layout')

@section('titulo')
    <h1>Criar Cliente</h1>
@endsection

@section('barra-lateral')  
  <h3>Meu valor personalizado 2</h3>

  @parent
@endsection

@section('conteudo')
<br>
<form action="<?= route('clients.save') ?>" method="POST">
    <input type="hidden" name="_token" value="<?= csrf_token() ?>">
    <input type="hidden" name="_method" value="PUT">
    Nome: <input type="text" name="name"><br>
    Idade: <input type="text" name="age"><br>
    <input type="submit" value="Salvar">
</form>

    
<br>
<a href="<?= route('clients.list') ?>">Lista de clientes</a>

@endsection

