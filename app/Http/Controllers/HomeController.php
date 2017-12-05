<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Tarefa;
use App\User;
use Auth;

class HomeController extends Controller
{
    private $usuario;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $currentuserid = Auth::user()->id;
        $list_tarefas = DB::table('tarefas')->where('user_id', $currentuserid)->get();
        return view('home', [
            'tarefas' => $list_tarefas
        ]);
        //return view('home');
    }
}
