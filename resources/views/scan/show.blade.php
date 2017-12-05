@extends('layouts.app')

@section('content')
<div class="container container--page">
	<scan-container
		:workscan=" {{ $scan }} "
		:scanmodel=" {{ $scanmodel }} "
	>
	</scan-container>
</div>
@endsection
