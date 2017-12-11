@extends('layouts.app')

@section('content')
<div class="container container--page">
    <div class="row">
        <div class="col-md-12">
            @if(count($scan->group))
                <span class="breadcrumb"> Arbeidsmarktregio: {{ $scan->group->district->districtmodel->title }} </span>
                <h1 class="section--title"> Groepsscan: {{ $scan->group->title }} </h1>
            @else
                <span class="breadcrumb"> Arbeidsmarktregio: {{ $scan->district->districtmodel->title }} </span>
                <h1 class="section--title">{{ $scan->title }} </h1>
            @endif
        </div>
    </div>
    <div class="row">
    	<div class="col-md-12">
    		<h2 class="page--title"> Beoordeel de huidige gezamenlijke aanpak </h2>
    		<span class="page--clarification"> Kunt u aangeven hoe goed uw regio het volgens u doet voor wat betreft de gezamenlijke aanpak om jongeren in een kwetsbare positie tijdens en na hun schoolloopbaan goed te begeleiden naar werk? Nul is ‘we doen dat als regio slecht’ en honderd is ‘we doen dat als regio perfect’.
 </span>
    	</div>
    </div>
    <?php 
        $loggedin = Auth::guest() ? 0 : 1;
    ?>
    <div class="row content--page">
    	<div class="col-sm-12">
            <algemeenbeeld :workscan=" {{ $scan }} " :loggedin=" {{ $loggedin }} "></algemeenbeeld>
    	</div>
    </div>
    <div class="prev-next-nav">
    	<a href=" {{ route('scan.regioincijfers', $scan) }} " class="btn prev-next-nav--prev">
    		<< vorige scherm
    	</a>
    	<a href=" {{ route('scan.algemeenbeeldresultaten', $scan) }} " class="btn prev-next-nav--next">
    		volgende scherm >>
    	</a>
    </div>
    <div class="row progressbar">
        <a href=" {{ route('scan.show', $scan) }} " class="progressbar--element" title="Introductie">
            <div>
                <img src="/img/play.svg" alt="">
            </div>
        </a>
        @if(Auth::check())
            @if(count($scan->group))
                <a href=" {{ route('scan.kennismaken', $scan) }} " class="progressbar--element" title="Kennismaken">
                    <div>
                        <img src="/img/group.svg" alt="">
                    </div>
                </a>
            @endif
        @endif
        <a href=" {{ route('scan.regioincijfers', $scan) }} " class="progressbar--element" title="Uw regio in cijfers">
            <div>
                <img src="/img/nederland-square.svg" alt="">
            </div>
        </a>
        <a href=" {{ route('scan.algemeenbeeld', $scan) }} " class="progressbar--element active" title="Beoordeel de huidige gezamenlijke aanpak">
            <div>
                <img src="/img/eye.svg" alt="">
            </div>
        </a>
        <a href=" {{ route('scan.algemeenbeeldresultaten', $scan) }} " class="progressbar--element" title="Algemeen beeld resultaten.">
            <div>
                <img src="/img/checkmark.svg" alt="">
            </div>
        </a>
        <a href=" {{ route('scan.showscan', $scan) }} " class="progressbar--element" title="15 vragen over 3 themas">
            <div>
                <img src="/img/scoreboard.svg" alt="">
            </div>
        </a>
    </div>
</div>
@endsection
