@extends('layouts.appscan')
@section('title', '15 vragen over 3 themas')

@section('hintsmodal')
    <hintsmodal
        :active=" true "
        :messages=" [

        ] "
        :loggedin=" {{ Auth::guest() ? 0 : Auth::user() }} "
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
