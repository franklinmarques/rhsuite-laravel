@extends('layouts.site')

@section('title', 'Login')

@section('logo')
    <div style="width: 100%; max-width: 400px; margin: 0 auto;">
        <div align="center">
            <img src="{{ $foto }}" style="width: auto; max-height: 100px; margin-bottom: 3%;">
            <h4 style="color: #111343; text-shadow: 1px 1px 1px rgba(255,255,255,0.5);">
                <strong>{{ $cabecalho }}</strong></h4>
        </div>
    </div>
@endsection

@section('content')

    <div class="login-wrapper">

        <div id="alert" style="margin: 10px auto;"></div>

        <form action="{{ url('login/autenticar') }}" method="post" data-aviso="alert" id="form-login"
              class="ajax-simple" autocomplete="off">
            @csrf
            <input type="hidden" name="geolocalizacao" value="">

            <div class="card">
                <div class="card-header" style="color:#fff; background-color: #000d59;">
                    <h5 class="card-title">Entre na sua conta</h5>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-user"></i></span>
                            </div>
                            <input type="text" name="email" class="form-control" placeholder="E-mail"
                                   value="{{ old('email') }}" autofocus="">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-lock"></i></span>
                            </div>
                            <input type="password" name="password" class="form-control" placeholder="Senha"
                                   autocomplete="new-password">
                        </div>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="possui_apontamento_horas"
                               name="possui_apontamento_horas" value="1" onchange="obter_geolocalizacao();">
                        <label class="custom-control-label" for="possui_apontamento_horas">Apontar entrada/saída</label>
                    </div>
                    <button type="submit" id="btnLogin" class="btn btn-default btn-block">Entrar</button>
                    <hr>
                    <a href="{{ url('recuperar_senha') }}" style="color: #000d59;"><u>Esqueceu a senha?</u></a>
                </div>
            </div>
        </form>

        <a class="btn btn-default btn-sm btn-block" style="box-shadow: 1px 2px 4px rgba(0, 0, 0, .15);" href="vagas">
            Consultar vagas | Cadastrar currículo
        </a>
        @if ($visualizacao_pilula_conhecimento)
            <button type="button" class="btn btn-default btn-sm btn-block"
                    style="margin-top: 3px; box-shadow: 1px 2px 4px rgba(0, 0, 0, .15);"
                    data-toggle="modal" data-target="#modal_pilulas_conhecimento">
                Pílulas de Conhecimento
            </button>
        @endif

    </div>

    <div id="modal_pilulas_conhecimento" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" style="float:right;" class="btn btn-default" data-dismiss="modal">Fechar
                    </button>
                    <h4 class="modal-title text-primary">
                        <strong>Programa de Formação Continuada - Pílulas de Conhecimento</strong>
                    </h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" autocomplete="off">
                        <div class="form-group">
                            <label for="area_conhecimento" class="col-sm-3 text-primary control-label"><strong>Área
                                    de conhecimento</strong></label>
                            <div class="col-sm-4">
                                {!! Form::select('area_conhecimento', $area_conhecimento, '', ['id' => 'area_conhecimento', 'class' => 'form-control']) !!}
                            </div>
                            <label for="tema" class="col-sm-1 text-primary control-label"><strong>Tema</strong></label>
                            <div class="col-sm-4">
                                {!! Form::select('tema', $tema, '', ['id' => 'tema', 'class' => 'form-control']) !!}
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-xs-12">
                                <div id="conteudo" class="embed-responsive embed-responsive-16by9"></div>
                            </div>
                        </div>
                    </form>
                    <div class="form-group">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endSection()

@section('scripts')

@endSection()
