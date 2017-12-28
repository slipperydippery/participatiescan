@extends('layouts.appscan')
@section('title', 'Introductie')

@section('content')
    <div class="row">
    	<div class="col-md-12">
    		<h2 class="page--title"> De scan is afgerond </h2>
            <span class="page--clarification">Je hebt alle vragen al beantwoord. Je kunt jezelf hier een overzicht van de actiepunten mailen, of naar een overzicht van alle resultaten gaan. </span>
    	</div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <a href=" {{ route('scan.emailresults', $scan) }} " class="btn btn--fullwidth">Email mij de actiepunten</a> <br> <br>
            <a href=" {{ route('scan.results', $scan) }} " class="btn btn--fullwidth btn--secondary">Bekijk alleen de resultaten</a>
        </div>
    </div>

@endsection
