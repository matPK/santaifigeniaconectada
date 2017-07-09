<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">
                {{Html::image('img/si_logo.png', 'SI Logo', ['height' => '100%'])}}
            </a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="{{Request::is('/') ? "active" : ""}}"><a href="/">Página Inicial</a></li>
                <!--<li class="{{Request::is('anuncios*') ? "active" : ""}}"><a href="/anuncios">Anúncios</a></li>-->
                <li class="{{Request::is('lojista*') ? "active" : ""}}"><a href="/lojista">Lojistas</a></li>
            </ul>
            
            <ul class="nav navbar-nav navbar-right">
                @if(Auth::check())
                <li class="nav navbar-text hidden-xs">{{Auth::user()->name}}</li>
                <li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST">{{ csrf_field() }}</form>
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <span class="glyphicon glyphicon-log-out"></span>
                        Sair
                    </a>
                </li>
                @else
                <li class="{{Request::is('login') ? "active" : ""}}">
                    <a href="{{ route('login') }}">
                        <span class="glyphicon glyphicon-log-in"></span>
                        Entrar
                    </a> 
                </li>
                @endif
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>