@extends('layouts.app')

@section('title', 'Empresas')

@section('header')
    <ol class="breadcrumb">
        <li class="breadcrumb-icon"><i class="fa fa-building"></i></li>
        <li class="breadcrumb-item active w-auto" aria-current="page">Empresas</li>
    </ol>
@endsection()

@section('content')
    <div class="table-responsive">
        <table id="table" class="table table-striped table-sm" style="width: 100%;">
            <thead>
            <tr>
                <th scope="col">Nome</th>
                <th scope="col">E-mail</th>
                <th scope="col">Status</th>
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
                    'url': '{{ action([App\Http\Controllers\EmpresaController::class, 'list']) }}'
                },
                'data': {},
                'columnDefs': [
                    {
                        'width': '50%',
                        'targets': [0, 1]
                    },
                    {
                        'className': 'text-center',
                        'targets': [2]
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
