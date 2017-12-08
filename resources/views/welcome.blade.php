@extends('layouts.app')

@section('content')
    <div class="content content--welcome">
        <section class="content--abovethefold">
            <div class="row container">
                <h1 class="title"><span class="title--participatie">Participatie</span><span class="title--dot">.</span><span class="title--scan">scan</span></h1>
                <h2 class="subtitle">Zet jouw kennis in. Verbeter de participatie van jongeren in een kwetsbare positie.</h2>
                <div class="featuredimg--container">
                    <div class="mainbutton--container">
                        <a href=" {{ route('startscan') }} " class="btn mainbutton">Doe de scan</a>
                    </div>
                </div>
            </div>
        </section>
        

        <section class="">
            <div class="row container">
                <div class="col-sm-4">
                    <div class="infoblock">
                        <h4>Films</h4>
                        <img src="/img/movie.svg" alt="">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="infoblock">
                        <h4>Kennisbank</h4>
                        <img src="/img/books.svg" alt="">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="infoblock">
                        <h4>Cijfers uit jouw regio</h4>
                        <img src="/img/nederland.svg" alt="">
                    </div>
                </div>
            </div>
        </section>

        <section class="content--fullwidthback">
            <div class="row container">
                <div class="col-sm-4">
                    <div class="infoblock">
                        <img src="/img/scoreboard.svg" alt="">
                        <span class="highlight">Waar staat jouw organisatie ten aanzien van 15 belangrijke succesfactoren?</span>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="infoblock">
                        <img src="/img/scales.svg" alt="">
                        <span class="highlight">Waar staan andere organisaties ten aanzien van 15 belangrijke succesfactoren?</span>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="infoblock">
                        <img src="/img/regionh.svg" alt="">
                        <span class="highlight">Ga aan tafel met partners uit jouw regio.</span>
                    </div>
                </div>
            </div>
        </section>
    
        <section>
            <div class="row container">
                <div class="col-sm-12">
                    
                    <h3 class="title--section">In hoeverre voldoet jouw organisatie aan belangrijke succesfactoren?</h3>
                </div>
            </div>
            <div class="row container">
                @foreach($scanmodel->themes as $theme)
                    <div class="col-sm-4"> 
                        <a href="#" class="btn themebutton themecolor-{{ $theme->id }}"> {{ $theme->title }} </a>
                    </div>
                @endforeach
            </div>
        </section>
    </div>
@endsection


