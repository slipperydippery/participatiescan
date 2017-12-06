@extends('layouts.app')

@section('content')
<div class="container container--page">
	<scan-container
		:workscan=" {{ $scan }} "
		:scanmodel=" {{ $scanmodel }} "
		:loggedin=" {{ Auth::check() }} "
	>
	</scan-container>
</div>
@endsection
