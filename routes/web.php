<?php

use Illuminate\Support\Facades\Route;

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

Route::get('login', 'App\Http\Controllers\LoginController@index')->name('login');
Route::post('login/autenticar', 'App\Http\Controllers\LoginController@autenticar');
Route::get('recuperar_senha', 'App\Http\Controllers\RecuperarSenhaController@index');

Route::get('', 'App\Http\Controllers\HomeController@index');
Route::get('home', 'App\Http\Controllers\HomeController@index');
Route::get('logout', 'App\Http\Controllers\HomeController@logout');
Route::resource('meu_perfil', 'App\Http\Controllers\UsuarioController', ['names' => 'usuario']);
Route::get('funcionarios', 'App\Http\Controllers\FuncionarioController@index');
Route::get('funcionarios/list', 'App\Http\Controllers\FuncionarioController@list');
Route::get('funcionarios/destroy{id}', 'App\Http\Controllers\FuncionarioController@destroy');

Route::get('empresas/list', 'App\Http\Controllers\EmpresaController@list');
Route::resource('empresas', 'App\Http\Controllers\EmpresaController', ['names' => 'empresas']);

Route::get('ajuda/list', 'App\Http\Controllers\AjudaController@list');
Route::resource('ajuda', 'App\Http\Controllers\AjudaController', ['names' => 'ajuda']);

Route::get('backup', 'App\Http\Controllers\BackupController@index');
Route::get('backup/list', 'App\Http\Controllers\BackupController@list');
Route::get('backup/ftp', 'App\Http\Controllers\BackupController@ftp');
Route::get('backup/sql', 'App\Http\Controllers\BackupController@sql');
Route::get('backup/delete', 'App\Http\Controllers\BackupController@delete');

Route::get('acessos/list', 'App\Http\Controllers\AcessoController@list');
Route::resource('acessos', 'App\Http\Controllers\AcessoController');
