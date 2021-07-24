<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('empresas');
    }

    public function list(Request $request)
    {
        $user = DB::table('usuarios')
            ->select(['nome', 'email', 'status', 'id'])
            ->where('tipo', 'empresa')
            ->limit(10)->get();
        $data = [];
        $status = [
            '1' => 'Ativo',
            '2' => 'Inativo',
        ];
        foreach ($user as $row) {
            $data[] = [
                $row->nome,
                $row->email,
                $status[$row->status] ?? null,
                '<a class="btn btn-sm btn-info" href="empresas/' . $row->id . '/editar" title="Editar evento"><i class="fa fa-pen"></i></a>
                 <a class="btn btn-sm btn-primary" href="empresas/' . $row->id . '/visualizar" title="Excluir evento"><i class="fa fa-chart-line"></i> Estatísticas</a>
                 <a class="btn btn-sm btn-warning" href="empresas/' . $row->id . '/treinamentos" title="Excluir evento"><i class="fa fa-book"></i> Treinamentos</a>
                 <button class="btn btn-sm btn-danger" onclick="delete_evento(' . $row->id . ')" title="Excluir empresa"><i class="fa fa-trash-alt"></i></button>'
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
        return view('empresas_cadastrar');
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
        $data = Usuario::find($id);
        abort_if(empty($data), 400, 'Empresa não encontrada ou recém-excluída.');
        return view('empresas_visualizar', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $empresa = Usuario::find($id);
        abort_if(empty($empresa), 400, 'Empresa não encontrada ou recém-excluída.');
        $data = [
            'row' => $empresa,
            'total_colaboradores' => 0,
        ];
        return view('empresas_editar', $data);
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
