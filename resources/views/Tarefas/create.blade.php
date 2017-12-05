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
        <div class="card-header">Inserir Tarefas</div>
        <div class="card-body">

            <form action="{{ url('/tarefas/store') }}" method="post">
                {{csrf_field()}}
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
                    <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Titulo da tarefa">
                </div>
                <div class="form-group">
                    <label for="conteudo">Conteudo</label>
                    <textarea class="form-control" id="conteudo" name="conteudo" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-primary" style="float:rigth;">Salvar</button>
            </form>
            <a href="{{ url('/home') }}" ><button class="btn btn-secondary">Voltar</button></a>
        </div>
    </div>
</div>
@endsection