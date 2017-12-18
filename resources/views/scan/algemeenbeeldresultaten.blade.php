@extends('layouts.appscan')
@section('title', 'Algemeen beeld resultaten')

@section('content')
    <div class="row">
    	<div class="col-md-12">
    		<h2 class="page--title"> Algemeen beeld resultaten</h2>

            @if(count($scan->group))
                <span class="page--clarification"> Bespreek met elkaar wat je van de gezamelijke huidige aanpak vindt. </span>
            @elseif(Auth::guest())
                <span class="page--clarification"> Met een account kun je hier de score zien die je hebt ingevuld, en jouw antwoord vergelijken met de groep of andere individuele scans. </span>
            @else
        		<span class="page--clarification"> Dit is het antwoord dat je gegeven hebt. Via het dashboard kun je jouw antwoorden vergelijken met andere deelnemers. </span>
            @endif
            
    	</div>
    </div>
    <div class="row content--page">
    	<div class="col-sm-12">
            <div class="row">
                <div class="col-sm-2">  </div>
                <div class="col-sm-2 table--instantie">  </div>
                <div class="col-sm-1 table--score"> score </div>
                <div class="col-sm-7">

                </div>
            </div>
            @if(count($scan->group))
                @foreach($scan->group->scans as $thisscan)
                    <div class="row">
                        <div class="col-sm-2"> {{ $thisscan->user->name }} </div>
                        <div class="col-sm-2 table--instantie"> {{ $thisscan->instantie->title }} </div>
                        <div class="col-sm-1 table--score"> {{ $thisscan->algemeenbeeld }} </div>
                        <div class="col-sm-7">
                            <input type="range" 
                                min="0" max="100"
                                value="{{ $thisscan->algemeenbeeld }}" 
                                disabled
                            >
                        </div>
                    </div>
                @endforeach
            @else
                <div class="row">
                    <div class="col-sm-2"> {{ $scan->user->name }} </div>
                    <div class="col-sm-2 table--instantie"> {{ $scan->instantie->title }} </div>
                    <div class="col-sm-1 table--score"> {{ $scan->algemeenbeeld }} </div>
                    <div class="col-sm-7">
                        <input type="range" 
                            min="0" max="100"
                            value="{{ $scan->algemeenbeeld }}" 
                            disabled
                        >
                    </div>
                </div>            
            @endif
            
    	</div>
    </div>
    <div class="prev-next-nav">
    	<a href=" {{ route('scan.algemeenbeeld', $scan ) }} " class="btn prev-next-nav--prev">
    		<< vorige scherm
    	</a>
    	<a href=" {{ route('scan.showscan', $scan) }} " class="btn prev-next-nav--next">
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
        <a href=" {{ route('scan.algemeenbeeld', $scan) }} " class="progressbar--element" title="Beoordeel de huidige gezamenlijke aanpak">
            <div>
                <img src="/img/eye.svg" alt="">
            </div>
        </a>
        <a href=" {{ route('scan.algemeenbeeldresultaten', $scan) }} " class="progressbar--element active" title="Algemeen beeld resultaten.">
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
@endsection
