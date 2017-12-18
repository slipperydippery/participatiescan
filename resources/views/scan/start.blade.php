@extends('layouts.appscan')
@section('title', 'Introductie')

@section('content')
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
    
    <div class="prev-next-nav">
        <a href=" {{ route('home') }} " class="btn prev-next-nav--prev">
            << vorige scherm
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
