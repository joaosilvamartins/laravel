<?php

namespace App\Http\Controllers;

use App\Models\Usuario;

class LoginController extends Controller
{

    public function cadastro(){

        $emailLogin = request('emailLogin');//email digitado pelo usuario
        $senhaLogin = request('senhaLogin');//senha digitada pelo usuario

        $usuarios = Usuario::all();
        $validoOuNao = false;
        $nomeUsuario = "";

        foreach($usuarios as $u){
            if($u->email == $emailLogin && $u->senha == $senhaLogin){//se o email e senha digitados pelo usuario forem iguais de uma linha do banco de dados
                $validoOuNao = true;
                $nomeUsuario = $u->nome;
                break;
            }
        }

        if($validoOuNao){
            return redirect('registro')->with('msg', "Bem-vindo, " . $nomeUsuario . "!");
        }
        else {
            return redirect('/')->with('msg', "Dados incorretos, tente novamente!");
        }

    }

    public function welcome(){

        return view('welcome', []);
    }

    public function esqueceuSenha(){

        return view('esqueceuSenha', []);
    }

    public function voltarParaLogin(){

        $emailLogin = request('emailLogin');
        $senhalogin = request('senhaLogin');

        $usuario = Usuario::where('email', $emailLogin)->first();//verificando se o email digitado pelo usuario é igual de um email que está no banco de dados

        if($usuario){
            $usuario->senha = $senhalogin;//atualiza a senha
            $usuario->save();//salvando a alteração
    
            return redirect('/');
        }
        else {
            return redirect('/esqueceuASenha')->with('msg', "E-mail não cadastrado!");
        }
    }

    public function voltar(){

        return view('welcome', []);
    }

}
