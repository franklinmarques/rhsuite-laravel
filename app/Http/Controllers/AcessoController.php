<?php

namespace App\Http\Controllers;

use App\Models\AcessoSistema;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * Class AcessoController
 * @package App\Http\Controllers
 */
class AcessoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('acessos');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $acesso = AcessoSistema::find($id);
        return response()->json($acesso);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function list(Request $request)
    {
        $user = DB::table('acesso_sistema', 'a')
            ->select(['usuarios.nome', 'a.data_acesso', 'a.data_saida', 'a.id'])
            ->join('usuarios',  'usuarios.id', '=', 'a.usuario')
            ->orderBy('a.data_acesso', 'desc')
            ->limit(10)->get();
        $data = [];
        $status = [
            '1' => 'Ativo',
            '2' => 'Inativo',
        ];
        foreach ($user as $row) {
            $data[] = [
                $row->nome,
                $row->data_acesso,
                $row->data_saida,
                '<a class="btn btn-sm btn-info" href="acessos/' . $row->id . '/visualizar" title="Editar ajuda"><i class="fa fa-info-circle"></i></a>
                 <button class="btn btn-sm btn-danger" onclick="delete_acesso(' . $row->id . ')" title="Excluir ajuda"><i class="fa fa-trash-alt"></i></button>'
            ];
        }
        $dataTableOutput = [
            'draw' => $request->input('draw'),
            'recordsTotal' => count($data),
            'recordsFiltered' => count($data),
            'data' => $data,
        ];
        return response()->json($dataTableOutput);
    }

}
