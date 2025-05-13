<h1>Formulário Keep</h1>


<h1>Listagem de Notas</h1>
<form action="{{isset($nota->id) ? route('keep.update') : route('keep.create')}}" method="post" class="form">
    @if (isset($nota->id))
        @method('PUT')
    @endif    
    @csrf
    <input type="hidden" name="id" value="{{ $nota->id ?? null }}">
    <label for="titulo">Titulo:</label>
    <input type="text" name="titulo" value="{{ $nota->titulo ?? '' }}"/> <br/>
    <label for="texto">Notas:</label>
    <input type="text" name="texto" value="{{ $nota->texto ?? '' }}"/><br/>

    <input type="submit">
</form>