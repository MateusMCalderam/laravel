<h1>Formulário Keep</h1>


<h1>Listagem de Notas</h1>
<form action="{{route('keep.aula.editarGravar')}}" method="post" class="form">
    @method('PUT')
    @csrf
    <input type="hidden" name="id" value="{{ $nota->id ?? null }}">
    <input type="text" name="texto" value="{{ $nota->texto ?? '' }}"/>

    <input type="submit">
</form>