<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tarefa extends Model
{
    protected $fillable = [
        'id', 'titulo', 'conteudo', 'user_id',
    ];

    protected $table = 'tarefas';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function userTarefas($id)
    {
        return static::where('user_id', 'LIKE', $id . '%')->get();
    }      
}
