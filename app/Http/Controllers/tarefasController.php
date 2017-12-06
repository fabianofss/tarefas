<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
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
        //Verificar se o usuario para tarefas publicas existe
        if (DB::table('users')->where('id', 99999999)->count() == 0) {
                //Se não exitir então cria
                DB::table('users')->insert([
                    'id'=>'99999999',
                    'name' => 'tester',
                    'email' => 'teste@admin.com',
                    'password' => bcrypt('admin'),
                    'remember_token' => str_random(10),
                ]);
        }        
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