@extends('layouts.appscan')
@section('title', 'Introductie')

@section('content')
    <div class="row">
    	<div class="col-md-12">
    		<h2 class="page--title"> De scan is afgerond </h2>
            <span class="page--clarification">Je hebt alle vragen al beantwoord. We adviseren om nu alvast een vervolgafspraak te maken om de uitgevoerde actiepunten om te zetten naar een werkagenda. De beheerder kan op de kalender een datum prikken zodat deze afspraak naar alle deelnemers van de groep kan worden gemaild. </span>
    	</div>
    </div>

	<dateholder
		:workscan=" {{ $scan }} "
	>
	</dateholder>

@endsection
