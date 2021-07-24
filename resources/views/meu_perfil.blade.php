@extends('layouts.app')

@section('title', 'Meu perfil')

@if (auth()->user('tipo') !== 'cliente')
@section('header')
    <ol class="breadcrumb">
        <li class="breadcrumb-icon"><i class="fa fa-user-circle"></i></li>
        <li class="breadcrumb-item active" aria-current="page">Meu perfil</li>
    </ol>
@endsection()
@endif

@section('content')
    <div id="alert"></div>
    <div class="card">
        <div class="card-body">
            <form action="{{ url('meu_perfil/update') }}" method="post" data-aviso="alert"
                  class="form-horizontal ajax-upload">
                @csrf
                @method('put')
                <div class="form-group">
                    <div class="col-sm-9 col-lg-10 controls">
                        <label class="control-label">Logo</label>
                        <br>
                        <div class="fileinput fileinput-new" data-provides="fileinput">
                            <div class="fileinput-new img-thumbnail" style="width: 200px; height: 150px;">
                                <img data-src="holder.jpg" alt="200x150" class="img-thumbnail">
                            </div>
                            <div class="fileinput-preview fileinput-exists img-thumbnail"
                                 style="max-width: 200px; max-height: 150px;">{{ $row->foto }}</div>
                            <div>
                                        <span class="btn btn-outline-secondary btn-file">
                                            <span class="fileinput-new">Selecionar imagem</span>
                                            <span class="fileinput-exists">Alterar</span>
                                            <input type="file" name="foto" accept="image/*">
                                        </span>
                                <a href="#" class="btn btn-outline-secondary fileinput-exists"
                                   data-dismiss="fileinput">Remover</a>
                            </div>
                        </div>
                        <span class="help-inline"><i>Dimensão máxima permitida (em pixels): 220x160</i></span>
                    </div>
                </div>
                @if ($row->tipo != 'funcionario')
                    <div class="form-group">
                        <div class="col-sm-9 col-lg-10 controls">
                            <label class="control-label">Cabeçalho relatórios</label>
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-new thumbnail" style="width: auto; height: 150px;">
                                    <?php
                                    $nome_foto_descricao = $row->foto_descricao;
                                    $logo_descricao = asset('imagens/usuarios/' . $nome_foto_descricao);

                                    if (!$row->foto_descricao) {
                                        $nome_foto_descricao = 'Sem imagem';
                                        $logo_descricao = "http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=Sem+imagem";
                                    }
                                    ?>
                                    <img src="{{ $logo_descricao }}" alt="{{ $nome_foto_descricao }}">
                                </div>
                                <div class="fileinput-preview fileinput-exists thumbnail"
                                     style="width: auto; height: 150px;"></div>
                                <div><span class="fileinput-filename"></span></div>
                                <div>
                                            <span class="btn btn-default btn-file">
                                                <span class="fileinput-new"><i class="fa fa-paper-clip"></i> Selecionar imagem</span>
                                                <span class="fileinput-exists"><i class="fa fa-undo"></i> Alterar</span>
                                                <input type="file" name="foto_descricao" class="default"
                                                       accept="image/*">
                                            </span>
                                    <a href="#" class="btn btn-default fileinput-exists"
                                       data-dismiss="fileinput"><i class="fa fa-trash"></i> Remover</a>
                                    &emsp;<span
                                        class="help-inline"><i> Dimensão máxima permitida (em pixels): 1800x160</i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label">Cabeçalho</label>

                        <div class="col-sm-9 col-lg-10 controls">
                            <input type="text" name="cabecalho" placeholder="Cabeçalho"
                                   value="{{ $row->cabecalho }}" class="form-control"/>
                        </div>
                    </div>
                @endif
                <div class="form-group">
                    <div class="col-sm-9 col-lg-10 controls">
                        <label class="control-label">Nome</label>
                        <input type="text" name="nome" placeholder="Nome" value="{{ $row->nome }}"
                               class="form-control"/>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-9 col-lg-10 controls">
                        <label class="control-label">E-mail</label>
                        <input type="text" name="email" placeholder="E-mail"
                               value="{{ $row->email }}" class="form-control"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 col-lg-2 control-label">Obs.:</label>

                    <div class="col-sm-9 col-lg-10 controls">
                        <p>(Caso não queira alterar a senha, deixe os campos abaixo em branco)</p>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-9 col-lg-10 controls">
                        <label class="control-label">Senha antiga</label>
                        <input type="password" name="senhaantiga" placeholder="Senha antiga"
                               class="form-control" autocomplete="new-password"/>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-9 col-lg-10 controls">
                        <label class="control-label">Nova senha</label>
                        <input type="password" name="novasenha" placeholder="Nova senha"
                               class="form-control" autocomplete="new-password"/>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-9 col-lg-10 controls">
                        <label class="control-label">Confirmar nova senha</label>
                        <input type="password" name="confirmarnovasenha" placeholder="Confirmar nova senha"
                               class="form-control" autocomplete="new-password"/>
                    </div>
                </div>
                @if ($row->tipo != 'funcionario')
                    <div class="form-group">
                        <div class="col-sm-3 col-lg-2 controls">
                            <label class="control-label">Situação</label>
                            <select name="status" class="form-control input-sm">
                                <option value="1"{{ ($row->status == "1" ? ' selected="selected"' : '') }}>
                                    Ativo
                                </option>
                                <option value="0"{{ ($row->status == "0" ? ' selected="selected"' : '') }}>
                                    Bloqueado
                                </option>
                            </select>
                        </div>
                        <div class="col-sm-5 controls">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="visualizacao_pilula_conhecimento"
                                           value="1" {{ $row->visualizacao_pilula_conhecimento ? 'checked' : '' }}>
                                    Visualizar Pílulas de Conhecimento na tela inicial
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col col-lg-3">
                            <label class="control-label">Fundo da tela inicial</label>
                            {!! Form::select('tipo_tela_inicial', $fundo_tela_inicial, old('adv_type', $row->tipo_tela_inicial), ['id' => 'tipo_tela_inicial', 'class' => 'form-control input-sm']) !!}
                        </div>
                    </div>

                    <div class="form-group" id="upload_imagem"
                         style="display: <?= $row->tipo_tela_inicial === '3' ? 'block' : 'none' ?>;">
                        <div class="col-sm-9 col-lg-10 controls">
                            <label class="control-label">Imagem de fundo</label>
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-new thumbnail" style="width: auto; height: 150px;">
                                    <?php
                                    $nome_imagem_fundo = 'Sem imagem';
                                    $imagem_fundo = "http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=Sem+imagem";
                                    if ($row->imagem_fundo) {
                                        $nome_imagem_fundo = $row->imagem_fundo;
                                        $imagem_fundo = asset('imagens/usuarios/' . $row->imagem_fundo);
                                    }
                                    ?>
                                    <img src="{{ $imagem_fundo }}" alt="{{ $nome_imagem_fundo }}">
                                </div>
                                <div class="fileinput-preview fileinput-exists thumbnail"
                                     style="width: auto; height: 150px;"></div>
                                <div><span class="fileinput-filename"></span></div>
                                <div>
                                            <span class="btn btn-default btn-file">
                                                <span class="fileinput-new"><i class="fa fa-paper-clip"></i> Selecionar imagem</span>
                                                <span class="fileinput-exists"><i class="fa fa-undo"></i> Alterar</span>
                                                <input type="file" name="imagem_fundo" class="default"
                                                       accept="image/png,image/jpeg,image/jpg">
                                            </span>
                                    <a href="#" class="btn btn-default fileinput-exists"
                                       data-dismiss="fileinput"><i class="fa fa-trash"></i> Remover</a>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="form-group" id="upload_video"
                         style="display: <?= $row->tipo_tela_inicial === '4' ? 'block' : 'none' ?>;">
                        <div class="col-sm-9 col-lg-10 controls">
                            <label class="control-label">Vídeo de fundo (.mp4)</label>
                            <div class="fileinput fileinput--{{ $row->video_fundo ? 'exists' : 'new' }} input-group"
                                 data-provides="fileinput">
                                <div class="form-control" data-trigger="fileinput">
                                    <i class="glyphicon glyphicon-file fileinput-exists"></i>
                                    <span class="fileinput-filename">{{ $row->video_fundo }}</span>
                                </div>
                                <div class="input-group-addon btn btn-default btn-file">
                                    <span class="fileinput-new">Selecionar vídeo</span>
                                    <span class="fileinput-exists">Alterar</span>
                                    <input type="file" name="video_fundo" accept="video/mp4"/>
                                </div>
                                <a href="#" class="input-group-addon btn btn-default fileinput-exists"
                                   data-dismiss="fileinput">Remover</a>
                            </div>
                            @if ($row->video_fundo)
                                <i class="help-block">Vídeo selecionado: {{ $row->video_fundo }}</i>
                            @endif
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="col-sm-9 col-lg-10 controls">
                            <label class="control-label">Assinatura Digital (Certificado treinamento)</label>
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-new thumbnail" style="width: auto; height: 150px;">
                                    <?php
                                    $assinatura_digital = "http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=Sem+imagem";
                                    $nome_assinatura_digital = '';
                                    if ($row->assinatura_digital) {
                                        $assinatura_digital = asset('imagens/usuarios/' . $row->assinatura_digital);
                                        $nome_assinatura_digital = $row->nome;
                                    }
                                    ?>
                                    <img src="{{ $assinatura_digital }}"
                                         alt="{{ $nome_assinatura_digital }}">
                                </div>
                                <div class="fileinput-preview fileinput-exists thumbnail"
                                     style="width: auto; height: 150px;"></div>
                                <div><span class="fileinput-filename"></span></div>
                                <div>
                                        <span class="btn btn-default btn-file">
                                            <span class="fileinput-new"><i class="fa fa-paper-clip"></i> Selecionar imagem</span>
                                            <span class="fileinput-exists"><i class="fa fa-undo"></i> Alterar</span>
                                            <input type="file" name="assinatura-digital" class="default"
                                                   accept="image/*">
                                        </span>
                                    <a href="#" class="btn btn-default fileinput-exists"
                                       data-dismiss="fileinput"><i class="fa fa-trash"></i> Remover</a>
                                    &emsp;<span
                                        class="help-inline"><i>Dimensão máxima permitida em pixels: 370 x 140</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                <div id="box-progresso" style="display: none;">
                    <div class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label">&nbsp;</label>

                        <div class="col-sm-9 col-lg-10 controls">
                            <div id="progresso" class="progress progress-mini pbar">
                                <div class="progress-bar progress-bar-success ui-progressbar-value"
                                     style="width:0%"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col">
                        <button type="submit" name="submit" class="btn btn-success"><i class="fa fa-save"></i>
                            Salvar
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endSection()
