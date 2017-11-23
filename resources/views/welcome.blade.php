<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="{{ URL::asset('/css/app.css') }}" rel="stylesheet">

        <title>Participatiescan</title>

    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif

            <div class="content content--welcome">
                <h1 class="title"><span class="title--participatie">Participatie</span><span class="title--">.</span><span class="title--scan">scan</span></h1>
                <h2 class="subtitle">Zet jouw kennis in. Verbeter de participatie van jongeren met een kwetsbare positie.</h2>
                
                <a href=" {{ route('startscan') }} " class="btn mainbutton">Doe de scan</a>
            
                <h3 class="title--section">In hoeverre voldoet jouw organisatie aan belangrijke succesfactoren?</h3>

                <div class="row">
                    @foreach($scanmodel->themes as $theme)
                        <div class="col-sm-4"> 
                            <a href="#" class="btn themebutton themecolor-{{ $theme->id }}"> {{ $theme->title }} </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </body>
</html>
