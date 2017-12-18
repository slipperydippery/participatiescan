<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Participatiescan - @yield('title')</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        Participatie.scan
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Functional links -->
                        <li><a href=" {{ route('home') }} "><img src="/img/dashboard.svg" alt=""></a></li>
                        <li><a href="#"><img src="/img/manual2.svg" alt=""></a></li>
                        <li><a href="#"><img src="/img/share.svg" alt=""></a></li>
                        <!-- Authentication Links -->
                        @guest
                            <li><a href="{{ route('login') }}">Log in</a></li>
                            <li><a href="{{ route('register') }}">Maak een account aan</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container container--page">
            <div class="row">
                <div class="col-md-12">
                    @if(count($scan->group))
                        <span class="breadcrumb"> 
                            Arbeidsmarktregios: 
                            @foreach($scan->group->owner->districts as $district)
                                {{ $district->title }} -
                            @endforeach
                         </span>
                        <h1 class="section--title"> Groepsscan: {{ $scan->group->owner->title }} </h1>
                    @else
                        <span class="breadcrumb"> 
                            Arbeidsmarktregios: 
                            @foreach($scan->districts as $district)
                                {{ $district->title }} -
                            @endforeach
                         </span>
                        <h1 class="section--title"> {{ $scan->title }} </h1>

                    @endif
                </div>
            </div>
            
            @yield('content')



        </div>
        <footer class="footer">
            <div class="container">
                <span class="text-muted">De Participatiescan is ontwikkeld in samenwerking met Lesco, Divosa, Ecorys, UWV, MEE, VOBC, BB, Ingrado, en NJI. Ontwikkeling door EMB AV.</span>
            </div>
        </footer>
    </div>

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/10.0.0/bootstrap-slider.js"></script>
    <script src="https://cdn.polyfill.io/v2/polyfill.min.js"></script>   
    <script>
       window.Laravel = {!! json_encode([
           'csrfToken' => csrf_token(),
       ]) !!};
   </script>
        
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
