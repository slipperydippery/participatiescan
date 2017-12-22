@extends('layouts.appscan')
@section('title', 'Introductie')

@section('content')
    <div class="row">
    	<div class="col-md-12">
    		<h2 class="page--title"> Introductiefilm </h2>
            @guest
                <span class="page--clarification">Bekijk de introductiefilm over wat en waarvoor de Participatiescan is. Of ga door naar het volgende scherm, als je de film of de sessiedeelnemers de film al hebben gezien. Tijdens een sessie kan de film gezamenlijk worden bekeken op het plenaire scherm.</span>
            @else
                @if(count($scan->group))
                    <span class="page--clarification">Bekijk de introductiefilm over het uitvoeren van de participatiescan of ga door naar het volgende scherm. We adviseren de film op een gezamelijk scherm te bekijken. </span>
                @else
                    <span class="page--clarification">Bekijk de introductiefilm over het uitvoeren van de participatiescan of ga door naar het volgende scherm. </span>
                @endif
            @endguest
    	</div>
    </div>
    <div class="row content--page">
    	<div class="col-sm-8 col-sm-offset-2">
            <video 
                preload="auto" 
                class="video-js vjs-big-play-centered vjs-16-9" 
                poster="/img/movie-thin-white.svg"
                controls
                data-setup="{}"
            >
                <source src="/videos/0_intro.mp4" type="video/mp4">
                <p class="vjs-no-js">
                    To view this video please enable JavaScript, and consider upgrading to a web browser that
                    <a href="https://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
                </p>
            </video>
    	</div>
    </div>
    
    <div class="prev-next-nav">
        <a href=" {{ route('home') }} " class="btn prev-next-nav--prev">
            << dashboard
        </a>
        <a href=" {{ route('scan.kennismaken', $scan) }} " class="btn prev-next-nav--next">
            volgende scherm >>
        </a>
    </div>
    <scan-progress
        :scanmodel="{{ App\Scanmodel::with('themes.questions')->find($scan->scanmodel->id) }}"
        :workscan=" {{ $scan }} "
        :page="'start'"
        >
    </scan-progress>

@endsection
