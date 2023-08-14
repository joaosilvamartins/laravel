@extends('layouts.main')

@section('title', 'Página Principal')

@section('content')

<div>
    <div>
        <form class="form" name="form" method="post">
            @csrf
            <label for="email">E-mail:</label>
            <input type="text" id="emailLogin" name="emailLogin"><br><br>

            <label for="senha">Senha:</label>
            <input type="password" id="senhaLogin" name="senhaLogin"><br><br>

            <input type="submit" name="submitBusca" value="Login"><br><br>
        </form>
    </div>

    <div>
        <a href="esqueceuASenha" id="esqueceuSenha">Esqueci minha senha</a><br><br>
        <a href="formulario" id="cadastrar">Cadastre-se</a>
    </div>

</div>

@endsection