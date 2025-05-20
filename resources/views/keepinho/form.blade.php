<h1>Formulário Keep</h1>


<h1>Listagem de Notas</h1>

@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $erro)
        <li style="color: red;">{{ $erro }}</li>
        @endforeach
    </ul>
@endif

<form action="{{isset($nota->id) ? route('keep.update') : route('keep.create')}}" method="post" class="form">
    @if (isset($nota->id))
        @method('PUT')
    @endif    
    @csrf
    <input type="hidden" name="id" value="{{ $nota->id ?? null }}">
    <label for="titulo">Titulo:</label>
    <input type="text" name="titulo" value="{{old('titulo', $nota->titulo)}}"/> <br/>
    <label for="texto">Notas:</label>
    <input type="text" name="texto" value="{{ old('texto', $nota->texto) }}"/><br/>

    <input type="submit">
</form>