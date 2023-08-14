@extends('layouts.main')

@section('title', 'Página Principal')

@section('content')

<div class="table-container">
    <div>
        <a href='formulario' id="cadastrar">Cadastrar novo usuário -></a><br><br>
    </div>
    <div>
        <form class="form" name="form" action="/registro" method="post">
            @csrf
            <input type="text" id="busca" name="busca" placeholder="Pesquisar">
            <select name="filtro" class="filtro">
                <option value="selecione">Selecione o filtro</option>
                <option value="nome">Filtrar por nome</option>
                <option value="email">Filtrar por e-mail</option>
            </select>
            <input type="submit" name="submitBusca" value="Buscar"><br><br>
        </form>
    </div>

    @if(count($usuarios) == 0)
        <table>
            <tbody>
                <tr>
                    <td>Nenhum usuário encontrado</td>
                </tr>
            </tbody>
        </table>
    @else
        <table>
            <tbody>
                <tr>
                    <td>Id</td>
                    <td>Nome</td>
                    <td>E-mail</td>
                    <td>Telefone</td>
                    <td>Data de nascimento</td>
                </tr>

                @foreach($usuarios as $usuario)
                    <tr>
                        <td>{{$usuario->id}}</td>
                        <td>{{$usuario->nome}}</td>
                        <td>{{$usuario->email}}</td>
                        <td>{{$usuario->telefone}}</td>
                        <td>{{$usuario->data_nascimento}}</td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    @endif
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

<script>
    $(document).ready(function(){
        $('.form').submit(function(event){
            event.preventDefault();

            $.ajax({
                url: '/',
                type: 'post',
                data: $(this).serialize(),
                success: function(response){
                    $('.table-container').html(response);
                }
            })
        })
    })
</script>

@endsection