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
            color: white;
            background-color: orange;
        }
    </style>
</head>
<body>
    <h1>Listagem de Notas</h1>
    <form action="{{route('keep.create')}}" method="post" class="form">
        @csrf <!-- {{ csrf_field() }} -->
        <input type="text" name="texto" />
        <input type="submit">
    </form>
    @if (count($notes) > 0)

    @foreach ($notes as $nota)
        <div class="nota">
            {{ $nota['texto'] }}
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
