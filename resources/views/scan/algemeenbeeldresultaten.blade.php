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
    		<h2 class="page--title"> Algemeen beeld resultaten.</h2>

            @if(count($scan->group))
                <span class="page--clarification"> Bespreek met elkaar wat je van de gezamelijke huidige aanpak vindt. </span>
            @elseif(Auth::guest())
                <span class="page--clarification"> Dit is het antwoord dat je gegeven hebt. Met een account kun je jouw antwoord vergelijken met de group of andere individuele scans. </span>
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
                        <div class="col-sm-2 table--instantie"> {{ $thisscan->instantie->instantiemodel->title }} </div>
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
                    <div class="col-sm-2 table--instantie"> {{ $scan->instantie->instantiemodel->title }} </div>
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
</div>
@endsection
