@extends('layouts.app')

@section('content')
    <div class="container container--page">
        <div class="row">
            <div class="col-md-12">
                <span class="breadcrumb"> <a href=" {{ route('home') }} ">Dashboard</a> > cijfers uit jouw regio </span>
                <h1 class="section--title"> Cijfers uit jouw regio </h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h2 class="page--title"> Introductiefilm </h2>
                <span class="page--clarification">Bekijk de introductiefilm over wat en waarvoor de Participatiescan is. Of ga door naar het volgende scherm, als je de film of de sessiedeelnemers de film al hebben gezien. Tijdens een sessie kan de film gezamenlijk worden bekeken op het plenaire scherm.</span>

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
    </div>
@endsection
