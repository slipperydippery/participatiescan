@extends('layouts.app')

@section('content')
<div class="container container--page">
    <div class="row">
        <div class="col-md-12">
            <span class="breadcrumb"> Introductiefilm </span>
            <h1 class="section--title"> Introductie </h1>
        </div>
    </div>
    <div class="row">
    	<div class="col-md-12">
    		<h2 class="page--title"> Introductiefilm </h2>
    		<span class="page--clarification">Bekijk de introductiefilm over het uitvoeren van de participatiescan of ga door naar het volgende scherm. We adviseren de film niet allemaal tegelijk, maar op een gezamelijk scherm te bekijken. </span>
    	</div>
    </div>
    <div class="row content--page">
    	<div class="col-sm-12">
    		<img src="/img/movie-thin.svg" alt="">
    	</div>
    </div>
    <div class="row prev-next-nav">
    	<a href="#" class="btn prev-next-nav--prev">
    		<< vorige scherm
    	</a>
    	<a href=" {{ route('scan.kennismaken', $scan) }} " class="btn prev-next-nav--next">
    		volgende scherm >>
    	</a>
    </div>
    <div class="row progressbar">
        <a href=" {{ route('scan.show', $scan) }} " class="progressbar--element active" title="Introductie">
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
        <a href=" {{ route('scan.algemeenbeeld', $scan) }} " class="progressbar--element" title="Beoordeel de huidige gezamenlijke aanpak">
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
