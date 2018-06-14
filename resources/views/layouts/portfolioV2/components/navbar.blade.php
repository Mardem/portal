<nav class="navbar navbar-expand-lg navbar-portfolio fixed-top" id="navbarPrincipal">
    <a class="navbar-brand portal" href="{{ route('inicio') }}">PF</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <i data-feather="menu"></i>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto" id="">
            <li class="nav-item active">
                <a class="nav-link" onclick="$('#home').animatescroll({scrollSpeed:2000,easing:'easeInOutBack'});"><i
                            data-feather="home"></i> Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" onclick="$('#ofertas').animatescroll({scrollSpeed:2000,easing:'easeInOutBack'});"><i
                            data-feather="tag"></i> Promoções</a>
            </li>
            <li class="nav-item">
                <a class="nav-link"
                   onclick="$('#produtos').animatescroll({scrollSpeed:2000,easing:'easeInOutBack'});"><i
                            data-feather="package"></i> Produtos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" onclick="$('#sobre').animatescroll({scrollSpeed:2000,easing:'easeInOutBack'});"><i
                            data-feather="message-circle"></i> Sobre</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" onclick="$('#contato').animatescroll({scrollSpeed:2000,easing:'easeInOutBack'});"><i
                            data-feather="phone-call"></i> Contato</a>
            </li>
            <li class="nav-item" style="background: #e91e63;" id="menuNavPrinc">
                <a class="nav-link" data-toggle="modal" data-target="#modalActions" style="color: #fff !important;"><i data-feather="grid"></i>Ações</a>
            </li>
        </ul>
        <div align="center">
            @if($info->facebook == '')
            @else
                <a href="{{ $info->facebook }}" target="_blank" style="font-size: 27px;margin-right: 30px"><i
                            data-feather="facebook"></i></a>
            @endif

            @if($info->twitter == '')
            @else
                <a href="{{ $info->twitter }}" target="_blank" style="font-size: 27px;margin-right: 30px"><i
                            data-feather="twitter"></i></a>

            @endif

            @if($info->instagram == '')
            @else
                <a href="{{ $info->instagram }}" style="font-size: 27px;margin-right: 30px" target="_blank"><i data-feather="instagram"></i></a>
            @endif

        </div>
    </div>
</nav>