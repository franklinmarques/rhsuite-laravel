@extends('layouts.app')

@section('title', 'Gestão de Docs/Helps')

@section('header')
    <ol class="breadcrumb">
        <li class="breadcrumb-icon"><i class="fa fa-info-circle"></i></li>
        <li class="breadcrumb-item active" aria-current="page">Gestão de Docs/Helps</li>
    </ol>
@endsection()

@section('content')
    <div class="row">
        <div class="col">
            <a href="<?= route('ajuda.create') ?>" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Novo
                Doc/Help</a>
        </div>
    </div>
    <br>
    <div class="table-responsive">
        <table id="table" class="table table-striped table-sm" style="width: 100%;">
            <thead>
            <tr>
                <th scope="col">URL página</th>
                <th scope="col">Orientações gerais</th>
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
                    'url': '{{ url('ajuda/list') }}',
                },
                'columnDefs': [
                    {
                        'width': '30%',
                        'targets': [0]
                    },
                    {
                        'width': '70%',
                        'targets': [1]
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
