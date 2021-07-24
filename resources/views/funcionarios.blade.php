@extends('layouts.app')

@section('title', 'Gerenciar Colaboradores')

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-icon"><i class="fa fa-user-circle"></i></li>
            <li class="breadcrumb-item active" aria-current="page">Gerenciar Colaboradores</li>
        </ol>
    </nav>

    <div class="card">
        <div class="card-body">

        </div>
    </div>
    <br>

    <div class="table-responsive">
        <table id="table" class="table table-striped table-sm" style="width: 100%;">
            <thead>
            <tr>
                <th scope="col">Cód.</th>
                <th scope="col">Nome</th>
                <th scope="col">Status</th>
                <th scope="col">Matrícula</th>
                <th scope="col">Depto/área/setor</th>
                <th scope="col">Nível acesso</th>
                <th scope="col">Cargo</th>
                <th scope="col">Função</th>
                <th scope="col">Ações</th>
            </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
@endSection()

@section('scripts')
    <script>
        let table;

        $(document).ready(function () {
            table = $('#table').DataTable({
                'processing': true,
                'serverSide': true,
                'order': [],
                'ajax': {
                    'url': '{{ action([App\Http\Controllers\FuncionarioController::class, 'list']) }}'
                },
                'data':{

                },
                'columnDefs': [
                    {
                        'width': '20%',
                        'targets': [1, 4, 6, 7]
                    },
                    {
                        'className': 'text-center text-nowrap',
                        'orderable': false,
                        'searchable': false,
                        'targets': [-1],
                    }
                ]
            });
        });

        function delete_funcionario(id) {
            confirm_deletion(function () {
                $.ajax({
                    'url': '{{ action([App\Http\Controllers\FuncionarioController::class, 'destroy'], ['id' => 1]) }}',
                    'data': {'id': id},
                    'success': function () {
                        table.ajax.reload(null, false);
                    },
                    'error': function (jqXHR, textStatus, errorThrown) {
                        bootbox.alert('Não foi possível remover, tente novamente.');
                    }
                });
            });
        }

    </script>
@endSection()
