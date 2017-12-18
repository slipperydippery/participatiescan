@extends('layouts.appscan')
@section('title', 'Regio in Cijfers')

@section('content')
    <div class="row">
    	<div class="col-md-12">
    		<h2 class="page--title"> Uw regio in cijfers </h2>
            @if(count($scan->group))
                <span class="page--clarification">Selecteer een arbeidsregio om te zien hoe verschillende factoren de NEET-rate beinvloeden. Bespreek met elkaar wat jullie opvalt.</span>
            @else
        		<span class="page--clarification">Selecteer een arbeidsregio om te zien hoe verschillende factoren de NEET-rate beinvloeden.</span>
            @endif
    	</div>
    </div>
    <div class="row content--page">
    	<div class="col-sm-12">
            <iframe scrolling="no" 
                src="https://monitoraoj.nl/arbeidsregio1/#primary" 
                style="border: 0px none; height: 763px; width: 1180px;"
                class="iframe--monitor"
            > 
            </iframe>
    	</div>
    </div>
    <div class="prev-next-nav">
        @if(count($scan->group))
            <a href=" {{ route('scan.kennismaken', $scan) }} " class="btn prev-next-nav--prev">
                << vorige scherm
            </a>
        @else
        	<a href=" {{ route('scan.show', $scan) }} " class="btn prev-next-nav--prev">
        		<< vorige scherm
        	</a>
        @endif
    	<a href=" {{ route('scan.algemeenbeeld', $scan) }} " class="btn prev-next-nav--next">
    		volgende scherm >>
    	</a>
    </div>
    
    <scan-progress
        :scanmodel="{{ App\Scanmodel::with('themes.questions')->find($scan->scanmodel->id) }}"
        :workscan=" {{ $scan }} "
        :page="'regioincijfers'"
        >
    </scan-progress>
@endsection
