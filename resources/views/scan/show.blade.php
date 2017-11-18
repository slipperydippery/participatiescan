@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
        	<scan-header
				:scan="{{ $scan }}"
        	>	
        	</scan-header>
			<div id="app">	
				<scan-container
					:scan=" {{ $scan }} "
					:scanmodel=" {{ $scanmodel }} "
				>
				</scan-container>
			</div>
        </div>
    </div>
</div>
@endsection
