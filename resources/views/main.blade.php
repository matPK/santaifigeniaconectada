<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        @include('partials._head')
    </head>
    <body>
        @include('partials._nav')
        <div class="container">
            @include('partials._messages')
        </div> <!-- end of .container -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    @if(Session::exists("showConnectButton"))
                        <a href="{{route("redirect")}}" class="btn btn-info btn-lg btn-block">CLIQUE PARA ACESSAR A INTERNET</a>
                    @endif
                    @yield('content')
                </div> <!-- end of .col -->
            </div> <!-- end of .row -->
        </div>
        <footer class="footer text-right">
            @include('partials._footer')
        </footer>
        @include('partials._javascript')
        @yield('scripts')
    </body>
</html>