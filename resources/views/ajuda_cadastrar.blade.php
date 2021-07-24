@extends('layouts.app')

@section('title', 'Cadastrar Doc/Help')

@section('header')
    <ol class="breadcrumb">
        <li class="breadcrumb-icon"><i class="fa fa-info-circle"></i></li>
        <li class="breadcrumb-item"><a href="{{ route('ajuda.index') }}"><u>Gestão de Docs/Helps</u></a></li>
        <li class="breadcrumb-item active" aria-current="page">Cadastrar Doc/Help</li>
    </ol>
@endsection()

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('ajuda.store') }}" method="post" data-aviso="alert"
                  class="form-horizontal ajax-upload" autocomplete="off">
                @csrf
                <input type="hidden" value="" name="id"/>
                <input type="hidden" value="{{ auth()->user('empresa') }}" name="id_empresa"/>

                <div class="row">
                    <div class="col-xs-12 text-right">
                        <button type="submit" name="submit" class="btn btn-success"><i
                                class="fa fa-save"></i> Salvar
                        </button>
                    </div>
                </div>

                <div class="form-body">
                    <div class="form-group">
                        <label class="control-label col-sm-2">URL página</label>
                        <div class="col-sm-10">
                            {!! Form::select('url_pagina', $url_paginas, old('url_pagina'), ['class' => 'form-control input-sm']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2">Orientacoes gerais</label>
                        <div class="col-sm-10">
                            <textarea name="orientacoes_gerais" class="form-control" rows="5"></textarea>
                        </div>
                    </div>
                    <fieldset>
                        <legend><small>Processo 1</small></legend>
                        <div class="row form-group">
                            <label class="control-label col-md-1 text-nowrap">Nome</label>
                            <div class="col-md-3">
                                <input type="text" name="nome_processo_1" class="form-control"
                                       placeholder="Padrão: Processo 1">
                            </div>
                            <label class="control-label col-md-1 text-nowrap">Processo 1</label>
                            <div class="col-md-7">
                                <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                    <div class="form-control" data-trigger="fileinput">
                                        <i class="glyphicon glyphicon-file fileinput-exists"></i>
                                        <span class="fileinput-filename"></span>
                                    </div>
                                    <div class="input-group-addon btn btn-default btn-file">
                                        <span class="fileinput-new">Selecionar arquivo</span>
                                        <span class="fileinput-exists">Alterar</span>
                                        <input type="file" name="arquivo_processo_1" accept=".pdf"/>
                                    </div>
                                    <a href="#" class="input-group-addon btn btn-default fileinput-exists"
                                       data-dismiss="fileinput">Limpar</a>
                                </div>
                                <span id="nome_processo_1" class="help-block"></span>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset>
                        <legend><small>Processo 2</small></legend>
                        <div class="row form-group">
                            <label class="control-label col-md-1 text-nowrap">Nome</label>
                            <div class="col-md-3">
                                <input type="text" name="nome_processo_2" class="form-control"
                                       placeholder="Padrão: Processo 2">
                            </div>
                            <label class="control-label col-md-1 text-nowrap">Arquivo</label>
                            <div class="col-md-7">
                                <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                    <div class="form-control" data-trigger="fileinput">
                                        <i class="glyphicon glyphicon-file fileinput-exists"></i>
                                        <span class="fileinput-filename"></span>
                                    </div>
                                    <div class="input-group-addon btn btn-default btn-file">
                                        <span class="fileinput-new">Selecionar arquivo</span>
                                        <span class="fileinput-exists">Alterar</span>
                                        <input type="file" name="arquivo_processo_2" accept=".pdf"/>
                                    </div>
                                    <a href="#" class="input-group-addon btn btn-default fileinput-exists"
                                       data-dismiss="fileinput">Limpar</a>
                                </div>
                                <span id="nome_processo_2" class="help-block"></span>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset>
                        <legend><small>Documentação 1</small></legend>
                        <div class="row form-group">
                            <label class="control-label col-md-1 text-nowrap">Nome</label>
                            <div class="col-md-3">
                                <input type="text" name="nome_documentacao_1" class="form-control"
                                       placeholder="Padrão: Documentação 1">
                            </div>
                            <label class="control-label col-md-1 text-nowrap">Arquivo</label>
                            <div class="col-md-7">
                                <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                    <div class="form-control" data-trigger="fileinput">
                                        <i class="glyphicon glyphicon-file fileinput-exists"></i>
                                        <span class="fileinput-filename"></span>
                                    </div>
                                    <div class="input-group-addon btn btn-default btn-file">
                                        <span class="fileinput-new">Selecionar arquivo</span>
                                        <span class="fileinput-exists">Alterar</span>
                                        <input type="file" name="arquivo_documentacao_1" accept=".pdf"/>
                                    </div>
                                    <a href="#" class="input-group-addon btn btn-default fileinput-exists"
                                       data-dismiss="fileinput">Limpar</a>
                                </div>
                                <span id="nome_documentacao_1" class="help-block"></span>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset>
                        <legend><small>Documentação 2</small></legend>
                        <div class="row form-group">
                            <label class="control-label col-md-1 text-nowrap">Nome</label>
                            <div class="col-md-3">
                                <input type="text" name="nome_documentacao_2" class="form-control"
                                       placeholder="Padrão: Documentação 2">
                            </div>
                            <label class="control-label col-md-1 text-nowrap">Arquivo</label>
                            <div class="col-md-7">
                                <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                    <div class="form-control" data-trigger="fileinput">
                                        <i class="glyphicon glyphicon-file fileinput-exists"></i>
                                        <span class="fileinput-filename"></span>
                                    </div>
                                    <div class="input-group-addon btn btn-default btn-file">
                                        <span class="fileinput-new">Selecionar arquivo</span>
                                        <span class="fileinput-exists">Alterar</span>
                                        <input type="file" name="arquivo_documentacao_2" accept=".pdf"/>
                                    </div>
                                    <a href="#" class="input-group-addon btn btn-default fileinput-exists"
                                       data-dismiss="fileinput">Limpar</a>
                                </div>
                                <span id="nome_documentacao_2" class="help-block"></span>
                            </div>
                        </div>
                    </fieldset>

                </div>

                <div class="row">
                    <div class="col-xs-12 text-right">
                        <button type="submit" name="submit" class="btn btn-success"><i
                                class="fa fa-save"></i> Salvar
                        </button>
                        <button type="button" class="btn btn-light" onclick="javascript:history.back()"><i
                                class="glyphicon glyphicon-circle-arrow-left"></i> Voltar
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endSection()
