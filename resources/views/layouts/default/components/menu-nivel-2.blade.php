<nav class="navbar-portal-formosa">
    <ul>
        <li>
            <a href="{{ route('inicio') }}" class="ion-ios-home"> Início</a>
        </li>
        <li>
            <a href="{{ route('pesquisaEmpresa') }}" class="ion-map"> Empresas</a>
        </li>
        <li>
            <a href="{{ route('todasNoticiasAberta') }}" class="ion-ios-book-outline"> Notícias</a>
        </li>
        <li>
            <a href="" class="ion-ios-musical-notes"> Eventos</a>
        </li>
        @auth
            <li class="nome-logado">
                <a href="{{ route('home') }}" class="ion-person"> {{ Auth::user()->name }}</a>
            </li>
        @endauth

        @auth
            <li class="menu-logado">

                <a href="{{ route('logout') }}"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">

                    <i class="ion-log-out"></i> Logout

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </a>
            </li>
            @else
                <li class="navbar-login">
                    <a href="{{ route('home') }}" class="ion-ios-person"> Login</a>
                </li>
            @endauth
    </ul>
</nav>