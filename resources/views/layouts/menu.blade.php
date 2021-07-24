<!--sidebar start-->
<aside>
    <div id="sidebar" class="nav-collapse">

        <!-- sidebar menu start-->

        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
                <li>
                    <a href="{{ url('') }}"
                       class="{{ in_array(url()->current(), [url(''), url('home')]) ? 'active' : '' }}">
                        <i class="fa fa-home"></i>
                        <span>Início</span>
                    </a>
                </li>

                <li class="sub-menu">
                    <a role="button"
                       class="{{ Str::startsWith(url()->current(), [route('empresas.index')]) ? 'active' : '' }}">
                        <i class="fa fa-building"></i>
                        <span>Empresas</span>
                    </a>
                    <ul class="sub">
                        <li class="{{ url()->current() == route('empresas.create') ? 'active' : '' }}">
                            <a href="{{ route('empresas.create') }}">Adicionar</a></li>
                        <li class="{{ url()->current() == route('empresas.index') ? 'active' : '' }}">
                            <a href="{{ route('empresas.index') }}">Gerenciar</a></li>
                    </ul>
                </li>

                <li class="sub-menu">
                    <a class="" role="button" {{ Str::startsWith(url()->current(), [route('ajuda.index'), url('backup'), url('acessos')]) ? 'active' : '' }}>
                        <i class="fa fa-server"></i>
                        <span>Gestão da Plataforma</span>
                    </a>
                    <ul class="sub">
                        <li class="{{ url()->current() == route('ajuda.index') ? 'active' : '' }}"><a
                                href="{{ route('ajuda.index') }}">Gestão de Docs/Helps</a></li>
                        <li class="{{ url()->current() == url('backup') ? 'active' : '' }}"><a
                                href="{{ url('backup') }}">Backup/Restore de Database</a></li>
                        <li class="{{ url()->current() == url('acessos') ? 'active' : '' }}"><a
                                href="{{ url('acessos') }}">Log de usuários</a></li>
                    </ul>
                </li>
            </ul>
        </div>

        <!-- sidebar menu end-->

    </div>
</aside>

<!--sidebar end-->
