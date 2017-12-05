<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tarefa;
use App\User;

class tarefasController extends Controller{
    private $tarefa;

    public function __construct(){
        $this->tarefa = new Tarefa();
    }

    public function index(){
        $list_tarefas = Tarefa::All();
        $usuario      = User::All();
        return view('tarefas.index', [
            'tarefas' => $list_tarefas,
            'usuario' => $usuario
        ]);
    }

    public function create(){
        $list_tarefas = Tarefa::All();
        $usuario      = User::All();        
        return view('tarefas.create', [
            'tarefas' => $list_tarefas,
            'usuario' => $usuario
        ]);
    }

    public function store(Request $request)
    {
        //var_dump($request->all());
        Tarefa::create($request->all());
        return redirect('/home')->with("message", "Tarefa criada com sucesso!");
    }

    public function editarView($id){
        //var_dump($this->getTarefa($id));
        return view('tarefas.edit', [
            'tarefa' => $this->getTarefa($id)
        ]);
    }

    public function excluirView($id){
        //var_dump($this->getTarefa($id));
        return view('tarefas.delete', [
            'tarefa' => $this->getTarefa($id)
        ]);
    }

    protected function getTarefa($id){
        return $this->tarefa->find($id);
    }

    public function destroy($id){
        $this->getTarefa($id)->delete();
        return redirect('/home')->with("message", "Tarefa excluida com sucesso!");
    }

    public function update(Request $request){
        $tarefa = $this->getTarefa($request->id);
        $tarefa->update($request->all());
        return redirect('/home')->with("message", "Tarefa alterada com sucesso!");
    }

}