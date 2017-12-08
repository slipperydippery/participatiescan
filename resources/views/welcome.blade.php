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
                        <a href="#"><span class="fineprint fineprint--welcome">Lees hier hoe de scan werkt</span></a>
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

        <section>
            <div class="row container welcome--textblock--container">
                <div class="col-sm-4 welcome--textblock">
                    <h3>Betere kansen voor jongeren</h3>
                    <span>Met deze participatiescan kun je samen met netwerkpartners werken aan een succesvolle aanpak om jongeren in een kwetsbare positie naar werk te begeleiden. De scan helpt je om de regionale aanpak te verbeteren aan de hand van 15 bewezen succesfactoren.</span>
                </div>
                <div class="col-sm-4 welcome--textblock">
                    <h3>15 Succesfactoren</h3>
                    <span>We weten veel over succesvolle arbeidstoeleiding van jongeren in een kwetsbare positie. Maar ‘Lessons Learned’ worden niet altijd toegepast in de praktijk. Met deze scan zet je kennis om in actie en kun je een effectieve, gezamenlijke aanpak te ontwikkelen.</span>
                </div>
                <div class="col-sm-4 welcome--textblock">
                    <h3>Gezamelijk aan tafel</h3>
                    <span>Maak een account aan, doe de scan en nodig netwerkpartners uit om hetzelfde te doen. Je kunt de resultaten met elkaar aan tafel bespreken of online via uw eigen dashboard met andere deelnemers vergelijken. Je komt tot gerichte verbeterpunten en een gezamenlijke werkagenda.</span>
                </div>
            </div>
        </section>
    </div>
@endsection


