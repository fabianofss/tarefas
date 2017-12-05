@extends('layouts.app')

@section('content')
    <div class="container">
        <dvi class="card">
            <div class="card-header">
                <h2>Tarefas Publicas</h2>
            </div>
            <div class="card-body">
            <div class="row">
            @foreach($tarefas as $tarefa)
                <div class='col-sm-4'>
                    <div class='card'>
                        <div class='card-header'>{{$tarefa->titulo}}</div>
                        <div class='card-body'>{{$tarefa->conteudo}}</div>
                        <div class="card-footer text-muted">Criada em: {{$tarefa->created_at}}</div>
                    </div>
                </div>
            @endforeach
            </div>           
            </div>
    </div>
@endsection