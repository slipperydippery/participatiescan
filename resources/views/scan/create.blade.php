@extends('layouts.app')

@section('content')
<div class="container container--page">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
        	<h1>Maak een nieuwe scan aan:</h1>
            {!! Form::open(['route' => 'scan.store']) !!}
            	@include('scan.partials.form', ['submittext' => 'Maak nieuwe scan aan'])
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
