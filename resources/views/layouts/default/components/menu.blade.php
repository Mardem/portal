<button class="menu"><span></span></button>
<div class="wrapper">
    <nav role='navigation'>
        <div class="elem" style="transform: perspective(1000px) rotateY(0deg) rotateX(0deg);">
            <ul>
                <li><a href="#" class="linkMenu ion-ios-home"> Início</a></li>
                <li><a href="{{ route('todasNoticias') }}" class="linkMenu ion-ios-paper"> Notícias</a></li>
                @auth
                   <li><a href="{{ url('/home') }}" class="linkMenu ion-ios-speedometer"> Dashboard</a></li>
                    @else
                        <li name="contact"><a href="{{ route('login') }}" class="linkMenu ion-log-in"> Login</a></li>
                        <li name="jquery"><a href="{{ route('register') }}" class="linkMenu ion-person-add"> Registrar</a></li>
                        @endauth
            </ul>
        </div>
    </nav>
</div>