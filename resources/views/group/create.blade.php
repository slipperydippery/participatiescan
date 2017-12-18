@extends('layouts.app')

@section('content')
<div class="container container--page">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
        	<h1>Maak een nieuwe group aan:</h1>

        	<create-group
        		:instanties=" {{ $instanties }} "
        		:alldistricts=" {{ $districts }} "
        	>
        	</create-group>
        </div>
    </div>
</div>
@endsection
