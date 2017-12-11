@extends('layouts.app')

@section('content')
<div class="container container--page">
    <div class="row">
        <div class="col-md-12">
            <span class="breadcrumb"> Arbeidsmarktregio: {{ $scan->group->district->districtmodel->title }} </span>
            <h1 class="section--title"> Groepsscan: {{ $scan->group->title }} </h1>
        </div>
    </div>
    <div class="row">
    	<div class="col-md-12">
    		<h2 class="page--title"> Kennismaken </h2>
    		<span class="page--clarification">Vaak zal niet iedereen elkaar kennen. Daarom een voorstelrondje, waarbij iedereen aangeeft: wie ben je, namens welke organisatie doe je mee, je rol/functie en wat je hoopt dat uit deze sessie komt (wens of droom).</span>

    	</div>
    </div>
    <div class="row content--page">
    	<div class="col-sm-12">
            <div class="row">
        		@foreach($scan->group->scans as $thisscan)
                    <div class="col-sm-2">
                        <div class="infoblock">
                            <span class="logged logged--in">ingelogd</span>
                            <img src="/img/user.svg" alt="">
                            <div class="infoblock--padded">
                                <span>{{ $thisscan->user->name }}</span>
                                <span class="center"><strong> {{ $thisscan->instantie->instantiemodel->title }} </strong></span>
                            </div>
                            
                        </div>
                    </div>
                @endforeach
                
            </div>
    	</div>
    </div>
    <div class="prev-next-nav">
    	<a href=" {{ route('scan.show', $scan) }} " class="btn prev-next-nav--prev">
    		<< vorige scherm
    	</a>
    	<a href=" {{ route('scan.regioincijfers', $scan) }} " class="btn prev-next-nav--next">
    		volgende scherm >>
    	</a>
    </div>
    <div class="row progressbar">
        <a href=" {{ route('scan.show', $scan) }} " class="progressbar--element" title="Introductie">
            <div>
                <img src="/img/play.svg" alt="">
            </div>
        </a>
        <a href=" {{ route('scan.kennismaken', $scan) }} " class="progressbar--element active" title="Kennismaken">
            <div>
                <img src="/img/group.svg" alt="">
            </div>
        </a>
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
