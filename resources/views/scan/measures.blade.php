@extends('layouts.app')

@section('content')
<div class="container container--page">
    <div class="row">
        <div class="col-md-12">
            @if(count($scan->group))
                <span class="breadcrumb"> Arbeidsmarktregio: {{ $scan->group->district->districtmodel->title }} </span>
                <h1 class="section--title"> Groepsscan: {{ $scan->group->title }} </h1>
            @else
                <span class="breadcrumb"> Arbeidsmarktregio: {{ $scan->district->districtmodel->title }} </span>
                <h1 class="section--title">{{ $scan->title }} </h1>
            @endif
        </div>
    </div>	
    <?php 
    	$loggedin = Auth::guest() ? 0 : 1;
    ?>

	<measures-container
		:workscan=" {{ $scan }} "
        :scanmodel=" {{ $scanmodel }} "
		:loggedin=" {{ $loggedin }} "
	>
	</measures-container>
</div>
@endsection