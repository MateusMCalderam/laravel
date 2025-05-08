<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes Restaurante</title>
</head>
<body>

    <h1>Clientes Restaurante</h1>

    
    <a href="{{route('restaurante.formCreate')}}">Adicionar</a>
    @if (count($clientes) > 0)

    @foreach ($clientes as $cliente)
        <table border="1">
            <tr>
                <th>Nome</th>
                <th>Endereço</th>
                <th>Telefone</th>
                <th>Data de Nascimento</th>
                <th>Ações</th>
            </tr>
            <tr>
                <td>{{ $cliente['nome'] }}</td>
                <td>{{ $cliente['estado'].", ".$cliente['cidade']." - ".$cliente['endereco'] }}</td>
                <td>{{ $cliente['telefone'] }}</td>
                <td>{{ $cliente['data_nascimento'] }}</td>
                <td>
                    <a href="{{route('restaurante.formUpdate', $cliente['id'])}}">Editar</a>
                </td>
            </tr>
        </table>
    @endforeach 
    @else
        <p>Nenhum cliente Cadastrado</p>
    @endif
</body>
</html>
