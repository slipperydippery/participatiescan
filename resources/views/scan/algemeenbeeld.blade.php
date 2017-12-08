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
    <div class="row content--page">
    	<div class="col-sm-12">
            <algemeenbeeld :workscan=" {{ $scan }} "></algemeenbeeld>
    	</div>
    </div>
    <div class="prev-next-nav">
    	<a href="#" class="btn prev-next-nav--prev">
    		<< vorige scherm
    	</a>
    	<a href=" {{ route('scan.algemeenbeeldresultaten', $scan) }} " class="btn prev-next-nav--next">
    		volgende scherm >>
    	</a>
    </div>
</div>
@endsection
