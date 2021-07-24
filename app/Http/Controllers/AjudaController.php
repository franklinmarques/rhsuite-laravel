<?php

namespace App\Http\Controllers;

use App\Models\Ajuda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AjudaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('ajuda');
    }

    public function list(Request $request)
    {
        $user = DB::table('ajuda')
            ->select(['url_pagina', 'orientacoes_gerais', 'id'])
            ->limit(10)->get();
        $data = [];
        $status = [
            '1' => 'Ativo',
            '2' => 'Inativo',
        ];
        foreach ($user as $row) {
            $data[] = [
                $row->url_pagina,
                $row->orientacoes_gerais,
                '<a class="btn btn-sm btn-primary" href="ajuda/' . $row->id . '/editar" title="Editar ajuda"><i class="fa fa-pen"></i></a>
                 <button class="btn btn-sm btn-danger" onclick="delete_ajuda(' . $row->id . ')" title="Excluir ajuda"><i class="fa fa-trash-alt"></i></button>'
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = ['url_paginas' => Ajuda::getUrlPaginas()];
        return view('ajuda_cadastrar', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('ajuda_visualizar');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ajuda = Ajuda::find($id);
        abort_if(empty($ajuda), 400, 'Item não encontrado ou recém-excluído.');
        $data = [
            'ajuda' => $ajuda,
            'url_paginas' => Ajuda::getUrlPaginas()
        ];
        return view('ajuda_editar', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
