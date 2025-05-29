<h1>Usuários</h1>
@if (Auth::user())
    Olá {{ Auth::user()->name }}
    <a href="{{ route('logout') }}">Logout</a>
    @else
    Não Autenticado
    <a href="{{ route('autenticate.login') }}">Login</a>
@endif
<hr>

@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $erro)
        <li style="color: red;">{{ $erro }}</li>
        @endforeach
    </ul>
@endif

<form method="post" action="{{ route('autenticate.create') }}">
@csrf
<label for="name">Nome:</label>
<input type="text" name="name" id="name" value="{{ old('name') }}"><br>
<label for="name">Email:</label>
<input type="text" name="email" id="email" value="{{ old('name') }}"><br>
<label for="password">Senha:</label>
<input type="password" name="password" id="password"><br>
<label for="password_confirm">Confirme sua senha:</label>
<input type="password" name="password_confirmation" id="password_confirm"><br>
<button type="submit">Enviar</button>
</form>

<hr>
<ul>
    @foreach ($users as $user )
        <li>{{ $user->name }}</li>
    @endforeach
</ul>