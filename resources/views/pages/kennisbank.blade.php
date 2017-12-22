@extends('layouts.app')

@section('content')
    <div class="container container--page">
        <div class="row">
            <div class="col-md-12">
                <span class="breadcrumb"> <a href=" {{ route('home') }} ">Dashboard</a> > kennisbank </span>
                <h1 class="section--title"> kennisbank  </h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h2 class="page--title"> Een weelde aan informatie </h2>
                <span class="page--clarification">Hieronder vindt u informatie over de succesfactoren voor het begeleiden van jongeren in een kwetsbare positie naar werk. Experts hebben aangegeven dat deze veelal ook gelden voor andere kwetsbare jongeren. Kijk gerust rond tussen de instrumenten/tools, programma’s en praktijkvoorbeelden. En zie hoe je via de opgenomen hyperlinks in contact komt met andere kennisbanken en inspirerende omgevingen, die scholen, gemeenten en partners ook op weg kunnen helpen om jongeren zo goed mogelijk een werkende toekomst te geven.</span>

            </div>
        </div>
        <div class="row content--page">
            <div class="col-sm-12">
                <img src="/img/movie-thin.svg" alt="">
            </div>
        </div>
    </div>
@endsection
