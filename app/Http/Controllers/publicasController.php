<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Tarefa;
use App\User;

class publicasController extends Controller
{   
    public function publico(){
        $usuario_id = 99999999;
        //$list_tarefas = Tarefa::All();
        $list_tarefas = Tarefa::where('user_id',  $usuario_id)->get();
        //$usuario      = User::All();

        $usuario = DB::table('users')->where('name', 'tester')->get();
        
        return view('publico', [
            'tarefas' => $list_tarefas,
            'usuario' => $usuario
        ]);
    }
}
