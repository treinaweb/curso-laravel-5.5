<h1>Lista de Cliente</h1> 

<br>
{{ Route::current()->uri }}
<br>
{{ Route::currentRouteName() }}

<br>

{{-- '<script>alert("Ola mundo")</script>' --}}

@{{ cliente }}

{{ $group }}

@if ($group == 'Restaurante')
  <p>O grupo é restaurante</p>
@elseif ($group == 'Atacado')
  <p>O grupo é atacado</p>
@else
  <p>O grupo não é restaurante</p>  
@endif  

@for ($i = 0; $i < 10; $i++)
  <p>O número é {{ $i }}</p>
@endfor

@forelse ($clients as $client)
  <p>Nome do cliente: {{ $client }}</p>
@empty
  <p>Nenhum cliente cadastro</p>
@endforelse