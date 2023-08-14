@extends('layouts.main')

@section('title', 'Página Principal')

@section('content')

<script>

    function botao(){
        var crie_senha = document.getElementById('crie_senha').value;
        var senha = document.getElementById('senha').value;
        var submit = document.getElementById('submit');

        if(crie_senha != senha || crie_senha == ''){
            submit.disabled = true;

            submit.style.cursor = '';
        }
        else{
            submit.disabled = false;

            submit.style.cursor = 'pointer';
        }
    }

</script>

<div>
    <form action="/formulario" method="post">
        @csrf
        <label for="name">Nome:</label>
        <input type="text" name="nome" id="nome"><br><br>

        <label for="email">E-mail:</label>
        <input type="text" name="email" id="email"><br><br>

        <label for="telefone">Telefone:</label>
        <input type="text" name="telefone" id="telefone"><br><br>

        <label for="data_nascimento">Data de nascimento:</label>
        <input type="date" name="data_nascimento" id="data_nascimento"><br><br>

        <label for="crie_senha">Crie sua senha:</label>
        <input type="password" name="crie_senha" id="crie_senha" oninput="botao()"><br><br>

        <label for="crie_senha">Confirme sua senha:</label>
        <input type="password" name="senha" id="senha" oninput="botao()"><br><br>

        <input type="submit" name="form" id="submit" disabled>
    </form>
</div>

@endsection