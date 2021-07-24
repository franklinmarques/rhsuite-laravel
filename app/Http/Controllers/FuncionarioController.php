<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FuncionarioController extends Controller
{
    public function index()
    {
        return view('funcionarios');
    }


    public function list(Request $request)
    {
        $user = DB::table('usuarios')->select(['id', 'nome', 'status', 'matricula', 'depto', 'area', 'setor', 'nivel_acesso', 'cargo', 'funcao'])->limit(10)->get();
        $data = [];
        foreach ($user as $row) {
            $data[] = [
                $row->id,
                $row->nome,
                $row->status,
                $row->matricula,
                implode('/', array_filter([$row->depto,$row->area,$row->setor])),
                $row->nivel_acesso,
                $row->cargo,
                $row->funcao,
                '<button class="btn btn-sm btn-primary" onclick="edit_evento(' . $row->id . ')" title="Editar evento"><i class="fa fa-pen"></i></button>
                 <button class="btn btn-sm btn-danger" onclick="delete_evento(' . $row->id . ')" title="Excluir evento"><i class="fa fa-trash-alt"></i></button>'
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

    public function destroy($id)
    {
        (new Usuario())->delete($id);
    }
}
