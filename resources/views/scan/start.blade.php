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
    		Bekijk de introductiefilm over het uitvoeren van de participatiescan of ga door naar het volgende scherm. We adviseren de film niet allemaal tegelijk, maar op een gezamelijk scherm te bekijken. </span>
    		<span class="page--clarification">
    	</div>
    </div>
    <div class="row content--page">
    	<div class="col-sm-12">
    		<img src="/img/movie.svg" alt="">
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
</div>
@endsection
