@extends('layouts.app')

@section('content')
<div class="container container--page">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
        	<h1>Maak een nieuwe scan aan:</h1>
        	<create-scan
        		:instanties=" {{ $instanties }} "
        		:groups=" {{ $groups }} "
        		:alldistricts=" {{ $districts }} "
        	>
        	</create-scan>
        </div>
    </div>
</div>
@endsection
