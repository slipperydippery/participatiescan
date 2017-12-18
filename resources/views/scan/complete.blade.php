@extends('layouts.appscan')
@section('title', 'Introductie')

@section('content')
    <div class="row">
    	<div class="col-md-12">
    		<h2 class="page--title"> Hi, your scan is complete </h2>
            <span class="page--clarification">Je hebt alle vragen al beantwoord. Wil je de scan in z'n geheel nogmaals doorlopen, of wil je je resultaten bekijken? </span>
    	</div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <a href=" {{ route('scan.startscan', $scan) }} " class="btn btn--fullwidth">Doorloop de scan nogmaals</a> <br> <br>
            <a href=" {{ route('scan.results', $scan) }} " class="btn btn--fullwidth btn--secondary">Bekijk alleen de resultaten</a>
        </div>
    </div>

@endsection
