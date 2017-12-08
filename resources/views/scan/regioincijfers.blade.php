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
    	<a href="#" class="btn prev-next-nav--prev">
    		<< vorige scherm
    	</a>
    	<a href=" {{ route('scan.algemeenbeeld', $scan) }} " class="btn prev-next-nav--next">
    		volgende scherm >>
    	</a>
    </div>
</div>
@endsection
