@extends('layouts.app')

@section('content')
<div class="container">
    <style>
        .btn-action{
            padding: 1px;
            float: right;
        }
    </style>
    <div class="row">
        <div style="width:100%">
            <div class="card card-default">
                <?php
                    if (Auth::check()){ //verifica se tem usuario logado
                        $usuario_id = Auth::user()->id;
                        $usuario    =  Auth::user()->name;
                    }
                    else{
                        $usuario_id = 99999999;
                        $usuario = '';
                    }
                ?>
                <div class="card-header">Bem vindo {{$usuario}}!</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a  class="btn btn-success btn-sm" href="{{ url('/tarefas/novatarefa') }}">Nova Tarefa</a>
                    <a  class="btn btn-primary btn-sm" href="{{ url('/publicas') }}">Tarefas Publicas</a>
                    </br>
                    <div class="" style="padding-bottom: 5px;padding-top: 20px;">
                        <h3>Suas Trefas:</h3>
                    </div>
                    <div class="row">
                        @foreach($tarefas as $tarefa)
                            <div class='col-sm-4'>
                                <div class='card'>
                                    <div class='card-header'>
                                        {{$tarefa->titulo}}                                 
                                    </div>
                                    <div class='card-body'>{{$tarefa->conteudo}}</div>
                                    <div class="card-footer text-muted">Criada em: {{$tarefa->created_at}}</div>
                                </div>
                                    <div class='card' style="margin-bottom: 15px;">
                                        <div>
                                            <a style="float: right;" class="btn btn-danger btn-sm" href="{{ url("/tarefas/$tarefa->id/excluir") }}" ><i class="material-icons md-18" style="font-size:18px;">delete</i></i>&nbsp;Excluir</a>
                                            <a style="float: right;" class="btn btn-primary btn-sm" href="{{ url("/tarefas/$tarefa->id/editar") }}"><i class="material-icons md-18" style="font-size:18px;">edit</i>&nbsp;Editar</a>
                                        </div>                                   
                                    </div>
                            </div>
                        @endforeach                 
                    </div>                  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
