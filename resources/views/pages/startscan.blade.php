@extends('layouts.appcms')

@section('content')
<div class="container container--page">
    <div class="row">
        <div class="col-sm-12 page--head">
            <h2>Welkom bij de Participatiescan</h2>
            <h3>De participatiescan doe je bij voorkeur door aan tafel te gaan met professionele partners uit jouw regio. Met een account kun je jouw resultaten vergelijken en delen met andere deelnemers. Maar je kunt ook eerst even kijken. Wat wil je doen?</h3>
        </div>
        <div class="col-md-12">
            <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label for="name" class="col-md-2 control-label">je naam</label>

                    <div class="col-md-10">
                        <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                        @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" class="col-md-2 control-label">je email</label>

                    <div class="col-md-10">
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="password" class="col-md-2 control-label">wachtwoord</label>

                    <div class="col-md-10">
                        <input id="password" type="password" class="form-control" name="password" required>

                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <label for="password-confirm" class="col-md-2 control-label">herhaal wachtwoord</label>

                    <div class="col-md-10">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-10 col-md-offset-2">
                        <span class="fineprint">door te registreren ga je akkoord met de <a href="#">gebruiksvoorwaarden</a></span>
                        <button type="submit" class="btn btn-primary btn--fullwidth">
                            maak je account aan
                        </button>
                        <span class="submit--choice">Of</span>
                        <a href=" {{ route('scan.loggless') }} " class="btn btn-link btn--secondary btn--fullwidth">
                            bekijk de scan zonder in te loggen
                        </a>
                        <span class="fineprint">(de resultaten worden niet opgeslagen)</span>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
