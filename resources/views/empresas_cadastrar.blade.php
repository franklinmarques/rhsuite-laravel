@extends('layouts.app')

@section('title', 'Cadastrar Empresa')

@section('styles')
    <style>
        .jstree-defaulto {
            color: #31708f;
        }

        .jstree-warning {
            color: #f0ad4e;
            margin-left: 10px;
        }
    </style>
@endsection

@section('header')
    <ol class="breadcrumb">
        <li class="breadcrumb-icon"><i class="fa fa-building"></i></li>
        <li class="breadcrumb-item active" aria-current="page">Cadastrar Empresa</li>
    </ol>
@endsection()

@section('content')
    <div id="alert"></div>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <form action="{{ route('empresas.store') }}" method="post" data-aviso="alert"
                          class="form-horizontal ajax-upload" autocomplete="off">
                        @csrf
                        <div class="box">
                            <div class="box-title">
                                <h3></h3>
                            </div>
                            <div class="box-content">
                                <div class="form-group">
                                    <label class="col-sm-3 col-lg-2 control-label">Empresa</label>
                                    <div class="col-sm-9 col-lg-10 controls">
                                        <input type="text" name="empresa" placeholder="Nome da empresa" value=""
                                               class="form-control"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 col-lg-2 control-label">E-mail</label>
                                    <div class="col-sm-9 col-lg-10 controls">
                                        <input type="text" name="email" placeholder="E-mail" value=""
                                               class="form-control"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 col-lg-2 control-label">Senha</label>
                                    <div class="col-sm-9 col-lg-10 controls">
                                        <input type="password" name="senha" placeholder="Senha" value=""
                                               class="form-control" autocomplete="new-password"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 col-lg-2 control-label">Confirmar Senha</label>
                                    <div class="col-sm-9 col-lg-10 controls">
                                        <input type="password" name="confirmarsenha"
                                               autocomplete="new-password"
                                               placeholder="Confirmar Senha" value="" class="form-control"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 col-lg-2 control-label">Situa????o</label>
                                    <div class="col-sm-3 col-lg-2 controls">
                                        <select name="status" class="form-control input-sm">
                                            <option value="1">Ativo</option>
                                            <option value="0">Bloqueado</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 col-lg-2 control-label">Qtde. m??xima
                                        colaboradores</label>
                                    <div class="col-sm-3 col-lg-2 controls">
                                        <input type="number" name="max_colaboradores"
                                               placeholder="Sem limite" value="" min="1"
                                               class="form-control"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 col-lg-2 control-label">Logo</label>
                                    <div class="col-sm-9 col-lg-10 controls">
                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                            <div class="fileinput-new thumbnail"
                                                 style="width: auto; height: 150px;">
                                                <img
                                                    src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=Sem+imagem"
                                                    alt=""/>
                                            </div>
                                            <div class="fileinput-preview fileinput-exists thumbnail"
                                                 style="width: auto; height: 150px;"></div>
                                            <div>
                                                        <span class="btn btn-white btn-file">
                                                            <span class="fileinput-new"><i class="fa fa-paper-clip"></i> Selecionar Imagem</span>
                                                            <span class="fileinput-exists"><i class="fa fa-undo"></i> Alterar</span>
                                                            <input type="file" name="logo" class="default"
                                                                   accept="image/*"/>
                                                        </span>
                                                <a href="#" class="btn btn-danger fileinput-exists"
                                                   data-dismiss="fileinput"><i class="fa fa-trash"></i>
                                                    Remover</a>
                                            </div>
                                        </div>
                                        <span class="help-inline"><i>Dimens??o m??xima permitida (em pixels): 220x160</i></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 col-lg-2 control-label">Foto descritiva</label>
                                    <div class="col-sm-9 col-lg-10 controls">
                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                            <div class="fileinput-new thumbnail"
                                                 style="width: auto; height: 150px;">
                                                <img
                                                    src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=Sem+imagem"
                                                    alt=""/>
                                            </div>
                                            <div class="fileinput-preview fileinput-exists thumbnail"
                                                 style="width: auto; height: 150px;"></div>
                                            <div>
                                                        <span class="btn btn-white btn-file">
                                                            <span class="fileinput-new"><i class="fa fa-paper-clip"></i> Selecionar Imagem</span>
                                                            <span class="fileinput-exists"><i class="fa fa-undo"></i> Alterar</span>
                                                            <input type="file" name="logo_descricao" class="default"
                                                                   accept="image/*"/>
                                                        </span>
                                                <a href="#" class="btn btn-danger fileinput-exists"
                                                   data-dismiss="fileinput"><i class="fa fa-trash"></i>
                                                    Remover</a>
                                            </div>
                                        </div>
                                        <span class="help-inline"><i>Dimens??o m??xima permitida (em pixels): 1800x160</i></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 col-lg-2 control-label">Tela Inicial</label>
                                    <div class="col-sm-9 col-lg-10 controls">
                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                            <div class="fileinput-new thumbnail"
                                                 style="width: auto; height: 150px;">
                                                <img
                                                    src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=Sem+imagem"
                                                    alt=""/>
                                            </div>
                                            <div class="fileinput-preview fileinput-exists thumbnail"
                                                 style="width: auto; height: 150px;"></div>
                                            <div>
                                                        <span class="btn btn-white btn-file">
                                                            <span class="fileinput-new"><i class="fa fa-paper-clip"></i> Selecionar Imagem</span>
                                                            <span class="fileinput-exists"><i class="fa fa-undo"></i> Alterar</span>
                                                            <input type="file" name="tela-inicial" class="default"
                                                                   accept="image/*"/>
                                                        </span>
                                                <a href="#" class="btn btn-danger fileinput-exists"
                                                   data-dismiss="fileinput"><i class="fa fa-trash"></i>
                                                    Remover</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 col-lg-2 control-label">Imagem de fundo</label>
                                    <div class="col-sm-9 col-lg-10 controls">
                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                            <div class="fileinput-new thumbnail"
                                                 style="width: auto; height: 150px;">
                                                <img
                                                    src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=Sem+imagem"
                                                    alt=""/>
                                            </div>
                                            <div class="fileinput-preview fileinput-exists thumbnail"
                                                 style="width: auto; height: 150px;"></div>
                                            <div>
                                                        <span class="btn btn-white btn-file">
                                                            <span class="fileinput-new"><i class="fa fa-paper-clip"></i> Selecionar Imagem</span>
                                                            <span class="fileinput-exists"><i class="fa fa-undo"></i> Alterar</span>
                                                            <input type="file" name="imagem_fundo" class="default"
                                                                   accept="image/png,image/jpeg,image/jpg"/>
                                                        </span>
                                                <a href="#" class="btn btn-danger fileinput-exists"
                                                   data-dismiss="fileinput"><i class="fa fa-trash"></i>
                                                    Remover</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 col-lg-2 control-label"></label>
                                    <div class="col col-lg-9">
                                        <label class="checkbox-inline">
                                            <input type="checkbox" id="imagem_fundo_padrao"
                                                   name="imagem_fundo_padrao" value="1" autocomplete="off">
                                            Usar imagem de
                                            fundo padr??o
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 col-lg-2 control-label">Assinatura
                                        Digital</label>
                                    <div class="col-sm-9 col-lg-10 controls">
                                        <!--<input type="file" name="assinatura-digital" class="form-control"  accept="image/*"/>-->
                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                            <div class="fileinput-new thumbnail"
                                                 style="width: auto; height: 150px;">
                                                <img
                                                    src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=Sem+imagem"
                                                    alt=""/>
                                            </div>
                                            <div class="fileinput-preview fileinput-exists thumbnail"
                                                 style="width: auto; height: 150px;"></div>
                                            <div>
                                                        <span class="btn btn-white btn-file">
                                                            <span class="fileinput-new"><i class="fa fa-paper-clip"></i> Selecionar Imagem</span>
                                                            <span class="fileinput-exists"><i class="fa fa-undo"></i> Alterar</span>
                                                            <input type="file" name="assinatura-digital" class="default"
                                                                   accept="image/*"/>
                                                        </span>
                                                <a href="#" class="btn btn-danger fileinput-exists"
                                                   data-dismiss="fileinput"><i class="fa fa-trash"></i>
                                                    Remover</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 col-lg-2 control-label">URL</label>
                                <div class="col-sm-9 col-lg-10 controls">
                                    <input type="text" name="url" placeholder="URL" value=""
                                           class="form-control"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 col-lg-2 control-label"></label>
                                <div class="col-sm-9 col-lg-10 controls">
                                    <label class="checkbox-inline">
                                        <input type="checkbox" id="visualizacao_pilula_conhecimento"
                                               name="visualizacao_pilula_conhecimento" value="1"> Mostrar
                                        P??lulas de Conhecimento na tela inicial
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2">
                                    <button type="submit" name="submit" class="btn btn-success"><i
                                            class="fa fa-save"></i> Cadastrar
                                    </button>
                                </div>
                            </div>
                        </div>
                        @if (auth()->user('empresa') === '78')
                            <fieldset>
                                <legend>
                                    <small>Sistema de gerenciamento de acesso ?? funcionalidades da
                                        Plataforma
                                    </small>
                                </legend>
                                <ul id="tree">
                                    <li>
                                        <input type="checkbox">
                                        <i class="fa fa-folder-open jstree-warning"></i>&ensp;&ensp;Lista
                                        de Pend??ncias
                                        <ul>
                                            <li>
                                                <input type="checkbox" name="hash_acesso[PAPD][]"
                                                       value="501">
                                                <i class="fa fa-file text-info"></i> Gerenciar
                                                pacientes
                                            </li>
                                            <li>
                                                <input type="checkbox" name="hash_acesso[PAPD][]"
                                                       value="502">
                                                <i class="fa fa-file text-info"></i> Gest??o
                                                Atividades/Defici??ncias
                                            </li>
                                            <li>
                                                <input type="checkbox" name="hash_acesso[PAPD][]"
                                                       value="503">
                                                <i class="fa fa-file text-info"></i> Relat??rio
                                                Totaliza????o Mensal
                                            </li>
                                            <li>
                                                <input type="checkbox" name="hash_acesso[PAPD][]"
                                                       value="510">
                                                <i class="fa fa-file text-info"></i> Gerenciar
                                                Atendimentos
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <input type="checkbox">
                                        <i class="fa fa-folder-open jstree-warning"></i>&ensp;&ensp;Gest??o
                                        Operacional ST
                                        <ul>
                                            <li>
                                                <input type="checkbox" name="hash_acesso[ST][]" value="401">
                                                <i class="fa fa-file text-info"></i> Gest??o de
                                                Contratos
                                            </li>
                                            <li>
                                                <input type="checkbox" name="hash_acesso[ST][]" value="402">
                                                <i class="fa fa-file text-info"></i>
                                                Totaliza????o Mensal
                                            </li>
                                            <li>
                                                <input type="checkbox" name="hash_acesso[ST][]" value="403">
                                                <i class="fa fa-file text-info"></i>
                                                Relat??rios
                                            </li>
                                            <li>
                                                <input type="checkbox" name="hash_acesso[ST][]" value="410">
                                                <i class="fa fa-file text-info"></i>
                                                Apontamentos Di??rios
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </fieldset>
                        @endif
                        <div class="row">
                            <div class="col">
                                <fieldset>
                                    <legend>
                                        <small>Sistema de gerenciamento de acesso ?? funcionalidades da
                                            Plataforma
                                        </small>
                                    </legend>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="hash_acesso[PD]" value="11"><i
                                                class="fa fa-folder-open jstree-warning"></i>&ensp;
                                            Lista de Pend??ncias | To Do
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="hash_acesso[SA]" value="23"><i
                                                class="fa fa-folder-open jstree-warning"></i>&ensp;
                                            Scheduler - Atividades
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="hash_acesso[EO]" value="24"><i
                                                class="fa fa-folder-open jstree-warning"></i>&ensp;
                                            Estrutura Organizacional
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="hash_acesso[JD]" value="13"><i
                                                class="fa fa-folder-open jstree-warning"></i>&ensp;
                                            Job Descriptor
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="hash_acesso[GP]" value="12"><i
                                                class="fa fa-folder-open jstree-warning"></i>&ensp;
                                            Gest??o de Pessoas
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="hash_acesso[PS]" value="14"><i
                                                class="fa fa-folder-open jstree-warning"></i>&ensp;
                                            Gest??o Processos Seletivos
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="hash_acesso[RP]" value="14"><i
                                                class="fa fa-folder-open jstree-warning"></i>&ensp;
                                            Requisi????es de Pessoal
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="hash_acesso[FE]" value="16"><i
                                                class="fa fa-folder-open jstree-warning"></i>&ensp;
                                            Gest??o Frequ??ncias/Eventos
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="hash_acesso[PC]" value="15"><i
                                                class="fa fa-folder-open jstree-warning"></i>&ensp;
                                            Programas de Capacita????o
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="hash_acesso[DO]" value="16"><i
                                                class="fa fa-folder-open jstree-warning"></i>&ensp;
                                            Gest??o de Documentos
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="hash_acesso[AS]" value="17"><i
                                                class="fa fa-folder-open jstree-warning"></i>&ensp;
                                            Ferramentas de Assessment
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="hash_acesso[DE]" value="18"><i
                                                class="fa fa-folder-open jstree-warning"></i>&ensp;
                                            Gest??o de Desempenho
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="hash_acesso[PE]" value="19"><i
                                                class="fa fa-folder-open jstree-warning"></i>&ensp;
                                            Gest??o de Pesquisas
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="hash_acesso[OS]" value="20"><i
                                                class="fa fa-folder-open jstree-warning"></i>&ensp;
                                            Ordens de Servi??o
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="hash_acesso[GC]" value="26"><i
                                                class="fa fa-folder-open jstree-warning"></i>&ensp;
                                            Gest??o Comercial
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="hash_acesso[FA]" value="21"><i
                                                class="fa fa-folder-open jstree-warning"></i>&ensp;
                                            Gest??o de Facilities
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="hash_acesso[RG]" value="25"><i
                                                class="fa fa-folder-open jstree-warning"></i>&ensp;
                                            Relat??rios de Gest??o
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="hash_acesso[PJ]" value="24"><i
                                                class="fa fa-folder-open jstree-warning"></i>&ensp;
                                            Gest??o de PJ
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="hash_acesso[PL]" value="22"><i
                                                class="fa fa-folder-open jstree-warning"></i>&ensp;
                                            Gest??o da Plataforma
                                        </label>
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endSection()

@section('scripts')
    <script>
        $('#tree input[type="checkbox"]').change(function (e) {

            let checked = $(this).prop("checked"),
                container = $(this).parent(),
                siblings = container.siblings();

            container.find('input[type="checkbox"]').prop({
                indeterminate: false,
                checked: checked
            });

            function checkSiblings(el) {

                let parent = el.parent().parent(),
                    all = true;

                el.siblings().each(function () {
                    return all = ($(this).children('input[type="checkbox"]').prop("checked") === checked);
                });

                if (all && checked) {

                    parent.children('input[type="checkbox"]').prop({
                        indeterminate: false,
                        checked: checked
                    });

                    checkSiblings(parent);

                } else if (all && !checked) {

                    parent.children('input[type="checkbox"]').prop("checked", checked);
                    parent.children('input[type="checkbox"]').prop("indeterminate", (parent.find('input[type="checkbox"]:checked').length > 0));
                    checkSiblings(parent);

                } else {

                    el.parents("li").children('input[type="checkbox"]').prop({
                        indeterminate: true,
                        checked: false
                    });

                }

            }

            checkSiblings(container);
        });

        $('#imagem_fundo_padrao').on('change', function () {
            $('[name="imagem_fundo"]').prop('disabled', $(this).is(':checked'));
        });
    </script>
@endSection()
