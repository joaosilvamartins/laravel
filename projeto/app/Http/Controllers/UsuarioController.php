<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;

class UsuarioController extends Controller
{

    public function registro(){

        $busca = request('busca');
        $filtro = request('filtro'); // Novo: Captura o filtro escolhido

        $usuarios = []; // Inicializa a variável

        if ($busca) {
            if($filtro == 'selecione'){
                $usuarios = Usuario::where(function($query) use ($busca) {
                    $query->where('nome', 'like', '%' . $busca . '%')
                          ->orWhere('email', 'like', '%' . $busca . '%');
                })->get();
            }
            if ($filtro == 'nome') {
                $usuarios = Usuario::where('nome', 'like', '%' . $busca . '%')->get();
            }
            if ($filtro == 'email') {
                $usuarios = Usuario::where('email', 'like', '%' . $busca . '%')->get();
            }
        }
        else {
            $usuarios = Usuario::all();
        }

        return view('registro', ['usuarios' => $usuarios, 'busca' => $busca, 'filtro' => $filtro]);

    }

    public function campoDeBusca(){

        $busca = request('busca');
        $filtro = request('filtro'); // Novo: Captura o filtro escolhido

        $usuarios = []; // Inicializa a variável

        if ($busca) {
            if($filtro == 'selecione'){
                $usuarios = Usuario::where(function($query) use ($busca) {
                    $query->where('nome', 'like', '%' . $busca . '%')
                          ->orWhere('email', 'like', '%' . $busca . '%');
                })->get();
            }
            if ($filtro == 'nome') {
                $usuarios = Usuario::where('nome', 'like', '%' . $busca . '%')->get();
            }
            if ($filtro == 'email') {
                $usuarios = Usuario::where('email', 'like', '%' . $busca . '%')->get();
            }
        }
        else {
            $usuarios = Usuario::all();
        }

        return view('registro', ['usuarios' => $usuarios, 'busca' => $busca, 'filtro' => $filtro]);

    }

    public function form(){
        //passando as variáveis para a blade

        return view('formulario', []);
    }

    public function store(Request $request){

        $usuario = new Usuario;

        $usuario->nome = $request->nome;
        $usuario->email = $request->email;
        $usuario->telefone = $request->telefone;
        $usuario->data_nascimento = $request->data_nascimento;
        $usuario->senha = $request->senha;

        $usuario->save();

        return redirect('/registro')->with('msg', 'Cadastrado com sucesso!');
    }
}
