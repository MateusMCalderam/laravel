<h1>Login</h1>
<hr>

@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $erro)
        <li style="color: red;">{{ $erro }}</li>
        @endforeach
    </ul>
@endif

<form method="post" action="{{ route('login') }}">
@csrf
<label for="name">Email:</label>
<input type="text" name="email" id="email" value="{{ old('name') }}"><br>
<label for="password">Senha:</label>
<input type="password" name="password" id="password"><br>
<button type="submit">Enviar</button>

</form>