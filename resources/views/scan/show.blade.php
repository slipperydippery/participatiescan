@extends('layouts.appscan')
@section('title', '15 vragen over 3 themas')

@section('content')

    <?php 
    	$loggedin = Auth::guest() ? 0 : 1;
    ?>

	<scan-container
		:workscan=" {{ $scan }} "
		:scanmodel=" {{ $scanmodel }} "
		:loggedin=" {{ $loggedin }} "
	>
	</scan-container>

@endsection
