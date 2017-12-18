@extends('layouts.appscan')
@section('title', 'Verbeterpunten uitwerken')

@section('content')

    <?php 
    	$loggedin = Auth::guest() ? 0 : 1;
    ?>

	<measures-container
		:workscan=" {{ $scan }} "
        :scanmodel=" {{ $scanmodel }} "
		:loggedin=" {{ $loggedin }} "
	>
	</measures-container>

@endsection
