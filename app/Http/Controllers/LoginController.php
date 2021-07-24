<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
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

        return view('login', $data);
    }

    private function getTenant()
    {
        $uri = str_replace(env('APP_URL'), '', url()->current());
        $tenant = Tenant::where('url', $uri)->get();
        if ($tenant) {
            return $tenant->url;
        }
        return null;
    }

    public function autenticar(Request $request)
    {
        $credentials = $request->only('email', 'password');
//dd($credentials);
        if (Auth::attempt($credentials)) {
            return response()->json([
                'aviso' => 'Email ou senha inválidos.'
            ], 403);
        }

        return response()->json([
            'retorno' => 1,
            'aviso' => 'Login efetuado com sucesso!',
            'redireciona' => 1,
            'pagina' => url('home')
        ]);
    }
}
