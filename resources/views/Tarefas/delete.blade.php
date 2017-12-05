@extends('layouts.app')

@section('content')
<?php
    if (Auth::check()){ //verifica se tem usuario logado
        $usuario_id = Auth::user()->id;
        $usuario    =  Auth::user()->name;
    }
    else{
        $usuario_id = 99999999;
    }
?>
<div class="content">
    <div class="row justify-content-md-center">
        <div class='col-sm-4 align-self-center'>
            <div class="card">
                <div class='card-header'>
                    <h3>Deseja realmente excluir?</h3>
                </div>            
            </div>
        <div class='card'>
            <div class='card-header'>
                <b>{{$tarefa->titulo}}</b>
            </div>
            <div class='card-body'>{{$tarefa->conteudo}}</div>           
        </div>
        <div class="card">
            <div class="row">
                <div class="col-5"></div>
                    <div class="col align-self-end">
                        <a class="btn btn-outline-primary" href="{{ url('/home') }}"><i class="material-icons">clear</i>&nbsp;Cancelar</a>
                        <a class="btn btn-outline-danger" href="{{ url("/tarefas/$tarefa->id/destroy") }}" ><i class="material-icons">delete</i></i>&nbsp;Excluir</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection