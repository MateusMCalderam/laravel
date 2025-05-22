<h1>Keepinho</h1>


<h2>🗑️Lixeira</h2>


<a href="{{ route('keep.list') }}">Voltar para Listagem</a>
<hr>

@if (session('sucess'))
<div style="color: green; border: solid green 2px; padding: 4px; font-size: 1.2rem;">
    {{session('sucess')}}
</div>
@endif

@if (count($notas) > 0)
<table border="1" style="width: 50%; margin: auto; margin-top: 40px;">
    <thead>
        <tr>
            <th>Titulo</th>
            <th>Texto</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($notas as $nota)
        <tr>
            <td>{{ $nota->titulo }}</td>
            <td>{{ $nota->texto }}</td>
            <td><a href="{{route('keep.restore', $nota->id)}}">Restaurar</a></td>
        </tr>
        @endforeach 
    </tbody>
</table>
@else
    <h1>Nenhuma Nota Apagada</h1>
@endif


