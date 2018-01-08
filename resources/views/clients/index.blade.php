<h1>Lista de Cliente</h1> 

<br>
{{ Route::current()->uri }}
<br>
{{ Route::currentRouteName() }}

<br>

{{-- '<script>alert("Ola mundo")</script>' --}}

@{{ cliente }}

{{ $client }} - {{ $group }}

