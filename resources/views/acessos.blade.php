@extends('layouts.app')

@section('title', 'Log de acessos dos usuários')

@section('header')
    <ol class="breadcrumb">
        <li class="breadcrumb-icon"><i class="fa fa-info-circle"></i></li>
        <li class="breadcrumb-item active" aria-current="page">Log de acessos dos usuários</li>
    </ol>
@endsection()

@section('content')
    <div class="card">
        <div class="card-body">

        </div>
    </div>
    <br>
    <div class="table-responsive">
        <table id="table" class="table table-striped table-sm" style="width: 100%;">
            <thead>
            <tr>
                <th scope="col">Nome do perfil</th>
                <th scope="col" nowrap>Data e hora de acesso</th>
                <th scope="col" nowrap>Data e hora de saída</th>
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
                    'url': '{{ url('acessos/list') }}',
                },
                'columnDefs': [
                    {
                        'width': '100%',
                        'targets': [0]
                    },
                    {
                        'classname': 'text-center text-nowrap',
                        'targets': [1, 2]
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

    </script>
@endSection()
