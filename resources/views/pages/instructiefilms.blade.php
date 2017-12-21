@extends('layouts.app')

@section('content')
    <div class="container container--page">
        <div class="row">
            <div class="col-md-12">
                <span class="breadcrumb"> <a href=" {{ route('home') }} ">Dashboard</a> > instructiefilms </span>
                <h1 class="section--title"> Bekijk de instructiefilms  </h1>
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
        		<img src="/img/movie-thin.svg" alt="">
        	</div>
        </div>
    </div>
@endsection
