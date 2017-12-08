@extends('layouts.app')

@section('content')
    <div class="content content--welcome">
        <section class="content--abovethefold">
            <div class="row container">
                <h1 class="title"><span class="title--participatie">Participatie</span><span class="title--dot">.</span><span class="title--scan">scan</span></h1>
                <h2 class="subtitle">In hoeverre voldoet jouw organisatie aan 15 belangrijke succesfactoren? Verbeter de participatie van jongeren in een kwetsbare positie.</h2>
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
    </div>
@endsection


