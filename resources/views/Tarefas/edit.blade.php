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
    <div class="card">
        <div class="card-header">Editar Tarefas</div>
        <div class="card-body">

            <form action="{{ url('/tarefas/update') }}" method="post">
                {{csrf_field()}}
                <input type="hidden" name="id" value="{{$tarefa->id}}">
                <fieldset class="form-group">
                    <legend>Selecione o tipo de tarefa:</legend>
                    <div class="form-check form-check-inline">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="user_id" id="optionsRadios1" value="{{$usuario_id}}" checked>
                            Particular
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="user_id" id="optionsRadios2" value="99999999">
                            Publica
                        </label>
                    </div>
                </fieldset>
                <div class="form-group">
                    <label for="titulo">Titulo</label>
                    <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Titulo da tarefa" value="{{$tarefa->titulo}}">
                </div>
                <div class="form-group">
                    <label for="conteudo">Conteudo</label>
                    <textarea class="form-control" id="conteudo" name="conteudo" rows="3" >{{$tarefa->conteudo}}</textarea>
                </div>
                <button type="submit" class="btn btn-success btn-sm" style="float:rigth;">Salvar</button>
                <a href="{{ url('/home') }}" class="btn btn-danger btn-sm">Voltar</a>
            </form>
            
        </div>
    </div>
</div>
@endsection