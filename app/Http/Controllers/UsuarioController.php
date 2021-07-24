<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

/**
 * Class UsuarioController
 * @package App\Http\Controllers
 */
class UsuarioController extends Controller
{
    public function index()
    {
        $data = [
            'row' => Usuario::find(1)
        ];
        return view('meu_perfil', $data);
    }

    public function salvarPerfil(Request $request)
    {

    }

    public function salvarSenha(Request $request)
    {

    }
}
