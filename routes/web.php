<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/publicas', 'publicasController@publico')->name('publico');


/**
 * Add New Task
 */
Route::group(['prefix' => 'tarefas'], function() {
    Route::get('/', 'tarefasController@index')->name('tarefas');
    Route::get('/novatarefa', 'tarefasController@create')->name('tarefas');
    Route::post('/store', 'tarefasController@store');
    Route::get("/{id}/editar", 'tarefasController@editarView');
    Route::post('/update', 'tarefasController@update');
    Route::get("/{id}/excluir", 'tarefasController@excluirView');
    Route::get("/{id}/destroy", 'tarefasController@destroy');
});