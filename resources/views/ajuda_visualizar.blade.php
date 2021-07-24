<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CORPORATE RH - LMS - Documentação</title>
    <link href="{{ asset('assets/css/vendor.css') }}" rel="stylesheet">

    <style>
        @page {
            margin: 40px 20px;
        }

        .btn-success {
            background-color: #5cb85c;
            border-color: #4cae4c;
            color: #fff;
        }

        .btn-primary {
            background-color: #337ab7 !important;
            border-color: #2e6da4 !important;
            color: #fff;
        }

        .btn-info {
            color: #fff;
            background-color: #5bc0de;
            border-color: #46b8da;
        }

        .btn-warning {
            color: #fff;
            background-color: #f0ad4e;
            border-color: #eea236;
        }

        .btn-danger {
            color: #fff;
            background-color: #d9534f;
            border-color: #d43f3a;
        }

        .text-nowrap {
            white-space: nowrap;
        }

        tr.group, tr.group:hover {
            background-color: #ddd !important;
        }
    </style>
</head>
<body style="color: #000;">
<div class="container-fluid">
    <br>
    <div class="row">
        <div class="col-sm-12 text-right">
            <button class="btn btn-default" onclick="javascript:window.close()"><i
                    class="glyphicon glyphicon-remove"></i> Fechar
            </button>
        </div>
    </div>

    @if ($processo)
        <h5 class="modal-title text-primary"><strong>Para orientações utilize as documentações das abas
                abaixo.</strong></h5>
        <br>
        <br>

        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active">
                <a href="#orientacoes_gerais" aria-controls="orientacoes_gerais" role="tab"
                   data-toggle="tab"><strong>Orientações gerais</strong>
                </a>
            </li>
            @if ($processo->arquivo_processo_1)
                <li role="presentation">
                    <a href="#arquivo_processo_1" aria-controls="arquivo_processo_1" role="tab"
                       data-toggle="tab">
                        <strong><?php echo($processo->nome_processo_1 ?? 'Processo 1'); ?></strong>
                    </a>
                </li>
            @endif
            @if ($processo->arquivo_processo_2)
                <li role="presentation">
                    <a href="#arquivo_processo_2" aria-controls="arquivo_processo_2" role="tab"
                       data-toggle="tab">
                        <strong>{{ ($processo->nome_processo_2 ?? 'Processo 2') }}</strong>
                    </a>
                </li>
            @endif; ?>
            @if ($processo->arquivo_documentacao_1)
                <li role="presentation">
                    <a href="#arquivo_documentacao_1" aria-controls="arquivo_documentacao_1" role="tab"
                       data-toggle="tab">
                        <strong>{{ ($processo->nome_documentacao_1 ?? 'Documentação 1') }}</strong>
                    </a>
                </li>
            @endif
            @if ($processo->arquivo_documentacao_2)
                <li role="presentation">
                    <a href="#arquivo_documentacao_2" aria-controls="arquivo_documentacao_2" role="tab"
                       data-toggle="tab">
                        <strong>{{ ($processo->nome_documentacao_2 ?? 'Documentação 2') }}</strong>
                    </a>
                </li>
            @endif
        </ul>

        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="orientacoes_gerais">
                <div class="row">
                    <div class="col-xs-12">
                        <br>
                        <p style="text-indent: 30px; color: #000; font-weight: normal;">
                            {!! nl2br($processo->orientacoes_gerais) !!}
                        </p>
                    </div>
                </div>
            </div>
            @if ($processo->arquivo_processo_1)
                <div role="tabpanel" class="tab-pane" id="arquivo_processo_1">
                    <br>
                    <div class="row">
                        <div class="col-xs-12">
                            <iframe
                                src="https://docs.google.com/gview?embedded=true&url=<?= url('arquivos/pdf/' . convert_accented_characters($processo->arquivo_processo_1)); ?>"
                                style="width:100%; height:600px; margin:0;" frameborder="0"></iframe>
                        </div>
                    </div>
                </div>
            @endif
            @if ($processo->arquivo_processo_2)
                <div role="tabpanel" class="tab-pane" id="arquivo_processo_2">
                    <br>
                    <div class="row">
                        <div class="col-xs-12">
                            <iframe
                                src="https://docs.google.com/gview?embedded=true&url=<?= url('arquivos/pdf/' . convert_accented_characters($processo->arquivo_processo_2)); ?>"
                                style="width:100%; height:600px; margin:0;" frameborder="0"></iframe>
                        </div>
                    </div>
                </div>
            @endif
            @if($processo->arquivo_documentacao_1)
                <div role="tabpanel" class="tab-pane" id="arquivo_documentacao_1">
                    <br>
                    <div class="row">
                        <div class="col-xs-12">
                            <iframe
                                src="https://docs.google.com/gview?embedded=true&url=<?= url('arquivos/pdf/' . convert_accented_characters($processo->arquivo_documentacao_1)); ?>"
                                style="width:100%; height:600px; margin:0;" frameborder="0"></iframe>
                        </div>
                    </div>
                </div>
            @endif
            @if ($processo->arquivo_documentacao_2)
                <div role="tabpanel" class="tab-pane" id="arquivo_documentacao_2">
                    <br>
                    <div class="row">
                        <div class="col-xs-12">
                            <iframe
                                src="https://docs.google.com/gview?embedded=true&url=<?= url('arquivos/pdf/' . convert_accented_characters($processo->arquivo_documentacao_2)); ?>"
                                style="width:100%; height:600px; margin:0;" frameborder="0"></iframe>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    @else
        <h5 class="modal-title text-primary"><strong>Nenhuma documentação disponível.</strong></h5>
    @endif

</div>

<script src="{{ asset("assets/js/vendor.js") }}"></script>

</body>
</html>
