<h1>Formulário Clientes Restaurante</h1>

<form action="{{isset($cliente->id) ? route('restaurante.update', $cliente->id) : route('restaurante.create') }}" method="post" class="form">
    @csrf
    @if (isset($cliente->id))
        @method('PUT')
    @endif
    <input type="hidden" name="id" value="{{ $cliente->id ?? null }}">
    <label for="nome">Nome:</label>
    <input type="text" name="nome" value="{{ $cliente->nome ?? '' }}"/> <br>
    <label for="nome">Cidade:</label>
    <input type="text" name="cidade" value="{{ $cliente->cidade ?? '' }}"/> <br>
    <label for="nome">Estado:</label>
    <input type="text" name="estado" value="{{ $cliente->estado ?? '' }}"/> <br>
    <label for="nome">Endereço:</label>
    <input type="text" name="endereco" value="{{ $cliente->endereco ?? '' }}"/> <br>
    <label for="nome">Telefone:</label>
    <input type="text" name="telefone" value="{{ $cliente->telefone ?? '' }}"/> <br>
    <label for="nome">Data de Nascimento:</label>
    <input type="date" name="data_nascimento" value="{{ $cliente->data_nascimento ?? '' }}"/> <br>

    <input type="submit">
</form>