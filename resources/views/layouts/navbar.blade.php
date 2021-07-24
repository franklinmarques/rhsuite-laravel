<nav class="header fixed-top clearfix navbar navbar-expand-lg navbar-light bg-light p-0" style="z-index: 1040;">
    <!--logo start-->
    <span class="navbar-brand brand">
<img src="{{ asset('assets/images/logorhsuite.jpg') }}"
     style="height: auto; width: auto; max-height: 78px; max-width: 239px; vertical-align: middle; padding: 5px;"
     alt="">
  </span>
    <!--logo end-->
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <!--  notification start -->
        <ul class="navbar-nav nav top-menu">
            <li class="nav-item dropdown" id="header_notification_bar">
                <a data-toggle="dropdown" class="sidebar-toggle-box" role="button" title="Mostrar/ocultar menu">
                    <i class="fa fa-bars"></i>
                </a>
            </li>
            <li class="nav-item dropdown" id="header_maximize_bar" style="display: none;">
                <a data-toggle="dropdown" class="sidebar-toggle-box" role="button" title="Tela cheia">
                    <i class="fa fa-expand"></i>
                </a>
            </li>
            <li class="nav-item dropdown">
                <a data-toggle="dropdown" class="sidebar-toggle-box" role="button"
                   title="Abrir documentação da página atual" onclick="documentacao();">
                    <i class="fa fa-question-circle"></i>
                </a>
            </li>
        </ul>
        <!--  notification end -->
        <!--search & user info start-->
        <ul class="navbar-nav mr-auto nav top-menu">
            @if (auth()->user('tipo') !== 'candidato_externo')
                <li class="nav-item dropdown">
                    <a title="{{ auth()->user('nome') ?? 'RhSuite' }}"
                       class="btn btn-sm btn-light rounded-pill dropdown-toggle"
                       type="button" id="dropdownMenuButton" role="button" data-toggle="dropdown" aria-haspopup="true"
                       aria-expanded="false" data-offset="0,10">
                        <img src="{{ asset('assets/images/user.png') }}" class="rounded-circle" alt="">
                        <span class="username">{{ auth()->user('nome') ?? 'RhSuite' }}</span>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        @if (auth()->user('tipo') === 'cliente')
                            <a class="dropdown-item" role="button" onclick="edit_perfil();">
                                <i class="fa fa-user-circle"></i> Meu perfil
                            </a>
                        @elseif (auth()->user('tipo') === 'candidato_externo')
                            <a class="dropdown-item" href="candidatoVagas/editarPerfil/{{ auth()->user('id') }}">
                                <i class="fa fa-user-circle"></i> Meu perfil
                            </a>
                        @elseif (auth()->user('tipo') === 'candidato')
                            <a class="dropdown-item"
                               href="recrutamento_candidatos/perfil/{{ auth()->user('id') }}">
                                <i class="fa fa-user-circle"></i> Meu perfil
                            </a>
                        @else
                            <a class="dropdown-item" href="{{ route('usuario.index') }}">
                                <i class="fa fa-user-circle"></i> Meu perfil
                            </a>
                        @endif
                        <a class="dropdown-item" role="button" data-toggle="modal"
                           data-target="#modal-contato">
                            <i class="fa fa-envelope"></i> Fale conosco
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ url('logout') }}">
                            <i class="fa fa-power-off"></i> Desconectar
                        </a>
                    </div>
                </li>
        @endif
        <!--search & user info end-->
        </ul>
    </div>
</nav>
<!--header end-->


<div id="modal-contato" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <div class="text-center w-100">
                    <img src="{{ asset('assets/images/logorhsuite.jpg') }}" title="logo" alt="">
                </div>
                <button type="button" class="btn btn-light close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <p class="text-center">Para contatar o administrador da plataforma, por gentileza enviar e-mail para: <a
                        href="mailto:contato@rhsuite.com.br">contato@rhsuite.com.br</a></p>
                <div class="form-group"></div>
            </div>
        </div>
    </div>
</div>
