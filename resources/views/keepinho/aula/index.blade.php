<!DOCTYPE html>
<html>
<head>
    <title>Keepinho</title>
    <style>
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
    @if (count($notes) > 0)

    @foreach ($notes as $nota)
        <div class="nota">
            {{ $nota['texto'] }}
            <form action="{{ route('keep.delete', $nota['id']) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <a href="{{route('keep.aula.editar', $nota->id)}}">Editar</a>
            </form>

        </div>
    @endforeach 
    @else
        <h1>Nenhuma Nota Cadastrada</h1>
    @endif
</body>
</html>
