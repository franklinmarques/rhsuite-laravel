@extends('layouts.app')

@section('title', 'Backup do Sistema')

@section('header')
    <ol class="breadcrumb">
        <li class="breadcrumb-icon"><i class="fa fa-database"></i></li>
        <li class="breadcrumb-item active" aria-current="page">Backup do Sistema</li>
    </ol>
@endsection()

@section('content')
    <div class="row">
        <div class="col">
            @if (auth()->user('tipo') == 'administrador')
                <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#novo"><i class="fa fa-plus"></i>
                    Criar novo backup
                </button>
            @else
                <button class="btn btn-sm btn-success" id="salvar" onclick="novo()"><i class="fa fa-plus"></i> Criar
                    novo
                    backup
                </button>
            @endif
            <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#restaurar" disabled><i
                    class="fa fa-upload"></i> Enviar backup local
            </button>
        </div>
    </div>
    <br>
    <div class="table-responsive">
        <table id="table" class="table table-striped table-sm" style="width: 100%;">
            <thead>
            <tr>
                <th scope="col">Data/hora</th>
                <th scope="col">Arquivo</th>
                <th scope="col">Tipo de backup</th>
                <th scope="col">Extensão</th>
                <th scope="col">Ações</th>
            </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
@endSection()

@section('scripts')
    <script>

        let save_method;
        let table;

        $(document).ready(function () {

            table = $('#table').DataTable({
                'info': false,
                'processing': true,
                'serverSide': true,
                'order': [[0, 'desc']],
                'ajax': {
                    'url': '{{ url('backup/list') }}',
                    'type': 'GET'
                },
                'columnDefs': [
                    {
                        'className': 'text-nowrap',
                        'targets': [0, 2, 5]
                    },
                    {
                        'className': 'text-center',
                        'targets': [0, 4]
                    },
                    {
                        'width': '100%',
                        'targets': [1]
                    },
                    {
                        'visible': true,
                        'targets': [4]
                    },
                    {
                        'searchable': false,
                        'targets': [2, 3, 4, 5],
                    },
                    {
                        'orderable': false,
                        'targets': [-1],
                    }
                ]
            });

            $("#tipo").change(function () {
                var id = $("#tipo option:selected").attr('id');

                if (id === 'codigo_fonte') {
                    $('#salvar').removeClass('disabled');
                    $('#salvar').attr('href', '{{ url('backup/ftp') }}');

                    $('#div_formato').attr('style', 'display:none');
                } else if (id === 'banco_dados') {
                    $('#salvar').addClass('disabled');
                    $('#div_formato').attr('style', 'display:block');
                }
            });

            $('#formato').change(function () {
                var formato = $("#formato option:selected").attr('id');

                $('#salvar').removeClass('disabled');
                $('#salvar').attr('href', '{{ url('backup/mysql') }}?tipo=' + formato);
            });
        });


        function reload_table() {
            table.ajax.reload(null, false);
        }


        function backup_delete(filename) {
            if (confirm('Deseja remover?')) {
                $.ajax({
                    'url': '{{ url('backup/delete') }}',
                    'type': 'POST',
                    'dataType': 'json',
                    'data': {'filename': filename},
                    'success': function (response) {
                        if (response.status) {
                            reload_table();
                        } else {
                            bootbox.alert('Não foi possível excluir o arquivo');
                        }
                    },
                    'error': function (jqXHR, textStatus, errorThrown) {
                        bootbox.alert('Error deleting data');
                    }
                });
            }
        }


        function restaura_backup(filename) {
            if (confirm('Deseja restaurar a base de dados atual?')) {
                $.ajax({
                    'url': '{{ url('backup/restaurar') }}',
                    'type': 'POST',
                    'dataType': 'json',
                    'data': {filename: filename},
                    'success': function (response) {
                        //if success reload ajax table
                        if (response.status === true) {
                            reload_table();
                        } else if (response.status === false) {
                            bootbox.alert('Não foi possível restaurar o backup');
                        } else {
                            bootbox.alert(response.status);
                        }
                    },
                    'error': function (jqXHR, textStatus, errorThrown) {
                        bootbox.alert('Error deleting data');
                    }
                });
            }
        }


        function restaura_do_arquivo() {
            $('#restaurar').modal('hide');
            if (confirm('Deseja restaurar a base de dados atual?')) {
                $("#form_restaurar").submit(function () {
                    $.ajax({
                        'url': '{{ url('backup/restaurar') }}',
                        'type': 'POST',
                        'dataType': 'JSON',
                        'data': new FormData(this),
                        'success': function (response) {
                            if (response.status === true) {
                                reload_table();
                            } else if (response.status === false) {
                                bootbox.alert('Não foi possível restaurar o backup');
                            } else {
                                bootbox.alert(response.status);
                            }
                        },
                        'error': function (jqXHR, textStatus, errorThrown) {
                            bootbox.alert('Error deleting data');
                        }
                    });
                });
            }
        }

    </script>
@endSection()
