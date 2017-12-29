@extends('layouts.appscan')
@section('title', '15 vragen over 3 themas')

@section('hintsmodal')
    <?php 
        $loggedin = Auth::guest() ? 0 : Auth::user();
    ?>

    <hintsmodal
        :active=" {{ $loggedin ? $loggedin->hints : true }} "
        :messages=" [
            'Als je een vraag hebt ingevuld, zie je dat in het menu onderin. Via het menu onderin kun je ook versneld door de scan bladeren.',

            'Je kunt altijd direct naar je dashboard via het icoon bovenin. Als je tussentijds stop worden je vragen opgeslagen.'

        ] "
        :loggedin=" {{ $loggedin }} "
    >
    </hintsmodal>
@endsection

@section('content')

	<scan-container
		:workscan=" {{ $scan }} "
		:scanmodel=" {{ $scanmodel }} "
		:loggedin=" {{ $loggedin }} "
	>
	</scan-container>

@endsection
