@extends('layouts.appscan')
@section('title', 'Scan Resultaten')

@section('content')

	<?php 
		$date_readable = false;
	?>

	@if(count($scan->scandate))
		<?php 
			$date_readable = $scan->scandate 
		?>
	@endif

	<results-container
		:workscan=" {{ $scan }} "
		:scanmodel=" {{ $scanmodel }} "
		:loggedin=" true "
		:date_readable=$date_readable
	>
	</results-container>

	@if(count($scan->scandate))
		<p>op {{ $scan->scandate->date_readable }} is een bijeenkomst gepland om de uitgevoerde actiepunten om te zetten naar een werkagenda </p>
	@else
		<p>Er is nog geen datum gepland om de uitgevoerde actiepunten om te zetten naar een werkagenda</p>
	@endif

@endsection
