<!DOCTYPE html>
<html>
<head>
    <title>Keepinho</title>
</head>
<body>
    <h1>Funcionou</h1>
    
    <h1>{{ $teste }}</h1>
    @foreach ($notes as $nota)
        <p>{{ $nota['name'] }}</p>
    @endforeach 
</body>
</html>
