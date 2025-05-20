<!DOCTYPE html>
<html>
<head>
    <title>Keepinho</title>
    <style>
        .form{
            margin-bottom: 20px;
        }
        .nota {
            display: inline-block;
            padding: 20px;
            border-radius: 15px;
            color: black;
            background-color: orange;
        }
    </style>
</head>
<body>
    <h1>Listagem de Notas</h1>
    <form action="{{route('keep.create')}}" method="post" class="form">
        @csrf
        <label for="titulo">Titulo:</label>
        <input type="text" name="titulo" value="{{ $nota->titulo ?? '' }}"/> <br/>
        <label for="texto">Notas:</label>
        <input type="text" name="texto" value="{{ $nota->texto ?? '' }}"/><br/>
        <input type="submit">
    </form>
    
        <a href="{{route('keep.form')}}">Adicionar</a>
        <br><br>


    @if ($errors->any())
    <ul>
        @foreach ($errors->all() as $erro)
        <li style="color: red;">{{ $erro }}</li>
        @endforeach
    </ul>
    @endif
    @if (count($notes) > 0)

    @foreach ($notes as $nota)
        <div class="nota">
            <strong>Titulo:</strong>{{ $nota['titulo'] }} <br/>
            <strong>Nota:</strong>{{ $nota['texto'] }}<br/>
            <!-- <form action="{{ route('keep.form', $nota->id) }}" method="POST" style="display:inline;">
                @method('get')
                <buttom type="submit" type="submit" style="background:none; border:none; color:blue; text-decoration:underline; cursor:pointer;">Editar</buttom>
            </form> -->
            
            <a href="{{route('keep.form', $nota->id)}}">Editar</a>
            <form action="{{ route('keep.delete', $nota['id']) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" style="background:none; border:none; color:blue; text-decoration:underline; cursor:pointer;">
                    Deletar
                </button>
            </form>

        </div>
    @endforeach 
    @else
        <h1>Nenhuma Nota Cadastrada</h1>
    @endif
</body>
</html>
