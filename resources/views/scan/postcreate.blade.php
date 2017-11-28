@extends('layouts.appcms')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12 page--head">
            <h2>Je scan is aangemaakt!</h2>
            <h3>Je scan is aangemaakt. Je kunt de scan meteen starten, of op een later tijdstip terugkomen.</h3>
        </div>
        <div class="col-sm-12">
            <div class="row">
                <div class="col-sm-6">
                    <a href=" {{ route('scan.show', $scan) }} " class="btn btn-primary btn--fullwidth">
                        start de scan nu
                    </a>
                </div>
                <div class="col-sm-6">
                    <a href=" {{ route('home') }} " class="btn btn--secondary btn--fullwidth">
                        naar je dashboard
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
