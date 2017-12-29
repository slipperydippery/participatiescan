@extends('layouts.appscan')
@section('title', 'Verbeterpunten uitwerken')

@section('hintsmodal')
    <?php 
        $loggedin = Auth::guest() ? 0 : Auth::user();
    ?>

    <hintsmodal
        :active=" {{ $loggedin ? $loggedin->hints : false }} "
        :messages=" [
            'Vul hier in welke acties je gaat ondernemen en wie de trekker is.  De afspraken kunnen worden gemaild naar alle deelnemers in de groep. En je kunt de afspraken ook via de scan op jouw dashboard bekijken.'

        ] "
        :loggedin=" {{ $loggedin }} "
    >
    </hintsmodal>
@endsection


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
