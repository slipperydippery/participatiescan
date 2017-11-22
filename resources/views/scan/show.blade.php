@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
			<div id="app">	
				<scan-container
					:workscan=" {{ $scan }} "
					:scanmodel=" {{ $scanmodel }} "
				>
				</scan-container>
			</div>
        </div>
    </div>
</div>
@endsection
