<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class RecuperarSenhaController extends Controller
{
    public function index()
    {
        $empresa = Usuario::find(78);

        $data = [
            'foto' => 'assets/images/logo1.png',
            'cabecalho' => $empresa->cabecalho,
            'imagem_fundo' => $empresa->imagem_fundo,
            'video_fundo' => $empresa->video_fundo,
            'visualizacao_pilula_conhecimento' => $empresa->visualizacao_pilula_conhecimento,
            'area_conhecimento' => [],
            'tema' => [],
        ];

        return view('recuperar_senha', $data);
    }
}
