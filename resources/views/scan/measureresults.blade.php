@extends('layouts.appscan')
@section('title', 'Introductie')

@section('content')
    <div class="row">
    	<div class="col-md-12">
    		<h2 class="page--title"> Overzicht van alle Actiepunten </h2>
            <span class="page--clarification">Hier is een overzicht van alle actiepunten.</span>
    	</div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            @foreach($measurescan->measures as $measure)
                @if($measure->active)
                    <div class="infoblock">
                        <h4> {{ $measure->question->theme->title }}: {{$measure->question->title}}</h4>
                        <span> {{ $measure->measure }} </span>
                    </div>
                @endif
            @endforeach
    </div>

@endsection
