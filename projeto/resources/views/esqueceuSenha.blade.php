@extends('layouts.main')

@section('title', 'Página Principal')

@section('content')

<script>

    function botao(){
        var senhaNova = document.getElementById('senhaLogin').value;//pegando o campo que o usuário digitará a senha
        var confirmeSenha = document.getElementById('confirmeSenhaLogin').value;//pegando o campo que o usuário confirmará a senha digitada
        var submit = document.getElementById('submitBusca');//pegando o botão

        if(senhaNova != confirmeSenha || senhaNova == ''){//se a senha não for igual nos dois campos que o usuário digitou a senha
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
    <div>
        <a href="/" class="voltar">Voltar</a><br><br>
    </div>
    <div>
        <form class="form" name="form" method="post">
            @csrf
            <label for="email">Digite seu e-mail cadastrado:</label>
            <input type="text" id="emailLogin" name="emailLogin"><br><br>

            <label for="senha">Nova senha:</label>
            <input type="password" id="senhaLogin" name="senhaLogin" oninput="botao()"><br><br>

            <label for="senha">Confirme a nova senha:</label>
            <input type="password" id="confirmeSenhaLogin" name="confirmeSenhaLogin" oninput="botao()"><br><br>

            <input type="submit" name="submitBusca" id="submitBusca" value="Voltar para Login" disabled><br><br>
        </form>
    </div>
</div>

@endsection