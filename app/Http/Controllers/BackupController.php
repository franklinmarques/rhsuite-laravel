<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * Class BackupController
 * @package App\Http\Controllers
 */
class BackupController extends Controller
{
    public function index()
    {
        return view('backup');
    }

    public function list(Request $request)
    {
        $post = $request->all();

        $ftp = storage_path('app/public/', false);
        $sql = storage_path('app/public/', false);

        $arrFtp = scandir($ftp);
        $arrSql = scandir($sql);

        $list = array();
        $recordsTotal = 0;
        $recordsFiltered = 0;

        if (auth()->user('tipo') == 'administrador') {
            foreach ($arrFtp as $arquivo) {
                if (is_file($ftp . $arquivo)) {
                    $list[] = array(
                        'data' => stat($ftp . $arquivo)['ctime'],
                        'nome' => $arquivo,
                        'tipo' => 'Diretório de arquivos',
                        'formato' => strstr($arquivo, '.'),
                        'protegido' => '<span class="text-muted fa fa-ok"></span>'
                    );
                }
                $recordsTotal++;
            }
        }
        foreach ($arrSql as $arquivo) {
            if (is_file($sql . $arquivo)) {
                $list[] = array(
                    'data' => stat($sql . $arquivo)['ctime'],
                    'nome' => $arquivo,
                    'tipo' => 'Banco de dados',
                    'formato' => strstr($arquivo, '.'),
                    'protegido' => '<span class="text-success fa fa-ok"></span>'
                );
            }
            $recordsTotal++;
        }

        $tmp = array();
        $columns = array('data', 'nome', 'tipo', 'formato', 'protegido');
        foreach ($list as $key => $value) {
            if (!empty($post['search']['value'])) {
                $search = strtolower($post['search']['value']);
                $lwData = date("d/m/Y H:i:s", $value['data']);
                $lwNome = strtolower($value['nome']);
                if (!(strstr($lwData, $search) or strstr($lwNome, $search))) {
                    unset($list[$key]);
                    continue;
                }
            }
            $tmp[] = $value[$columns[$post['order'][0]['column']]];
            $recordsFiltered++;
        }

        array_multisort($tmp, $post['order'][0]['dir'] === 'asc' ? SORT_ASC : ($post['order'][0]['dir'] === 'desc' ? SORT_DESC : SORT_REGULAR), $list);

        $data = array();
        foreach ($list as $arquivo) {
            $row = array();
            $row[] = date("d/m/Y H:i:s", $arquivo['data']);
            if ($arquivo['tipo'] === 'Banco de dados') {
                $row[] = '<span class="text-info fa fa-database"></span> ' . $arquivo['nome'];
            } else {
                $row[] = '<span class="text-warning fa fa-archive"></span> ' . $arquivo['nome'];
            }
            $row[] = $arquivo['tipo'];
            $row[] = $arquivo['formato'];
//            $row[] = $arquivo['protegido'];

            if ($arquivo['tipo'] === 'Banco de dados') {
                $row[] = '
                      <a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Baixar" onclick="baixar_backup(' . "'" . $arquivo['nome'] . "'" . ')"><i class="fa fa-download"></i></a>
                      <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Excluir" onclick="backup_delete(' . "'" . $arquivo['nome'] . "'" . ')"><i class="fa fa-trash"></i></a>
                      <a class="btn btn-sm btn-success" href="javascript:void(0)" title="Restaurar" onclick="restaura_backup(' . "'" . $arquivo['nome'] . "'" . ')"><i class="fa fa-play"></i> Restaurar</a>
                     ';
            } else {
                $row[] = '
                      <a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Baixar" onclick="baixar_backup(' . "'" . $arquivo['nome'] . "'" . ')"><i class="fa fa-download"></i></a>
                      <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Excluir" onclick="backup_delete(' . "'" . $arquivo['nome'] . "'" . ')"><i class="fa fa-trash"></i></a>
                      <button class="btn btn-sm btn-success disabled" title="Restaurar"><i class="fa fa-play"></i> Restaurar</button>
                     ';
            }

            $data[] = $row;
        }

        $dataTableOutput = array(
            "draw" => $request->input('draw'),
            "recordsTotal" => $recordsTotal,
            "recordsFiltered" => $recordsFiltered,
            "data" => $data,
        );

        return response()->json($dataTableOutput);
    }

    public function ftp()
    {

    }

    public function sql()
    {

    }

    public function delete()
    {

    }


}
