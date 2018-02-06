@extends('layouts.app')

@section('titulo-pagina')
    <h1>Detalhes da Tarefa</h1>
@endsection

@section('content')
    <div class="row">
      <div class="col-md-12">
        <p>O id da tarefa é: {{ $task->id }}</p>
        <p>O assunto da tarefa é: {{ $task->subject }}</p>
        <p>Tarefa executada: {{ $task->made ? 'Sim' : 'Não' }}</p>
        <p>O descrição da tarefa é: {{ $task->description }}</p>


        <a href="{{ route('tasks.index') }}">Volta para a lista de tarefas</a>
      </div>
    </div>
@endsection


