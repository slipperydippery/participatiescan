@extends('layouts.appscan')
@section('title', 'Beoordeel de huidige gezamenlijke aanpak')

@section('content')

    <div class="row">
    	<div class="col-md-12">
    		<h2 class="page--title"> Beoordeel de huidige gezamenlijke aanpak </h2>
    		<span class="page--clarification"> Kunt u aangeven hoe goed uw regio het volgens u doet voor wat betreft de gezamenlijke aanpak om jongeren in een kwetsbare positie tijdens en na hun schoolloopbaan goed te begeleiden naar werk? Nul is ‘we doen dat als regio slecht’ en honderd is ‘we doen dat als regio perfect’.
 </span>
    	</div>
    </div>
    <?php 
        $loggedin = Auth::guest() ? 0 : 1;
    ?>
    <div class="row content--page">
    	<div class="col-sm-12">
            <algemeenbeeld :workscan=" {{ $scan }} " :loggedin=" {{ $loggedin }} "></algemeenbeeld>
    	</div>
    </div>
    <div class="prev-next-nav">
    	<a href=" {{ route('scan.regioincijfers', $scan) }} " class="btn prev-next-nav--prev">
    		<< vorige scherm
    	</a>
    	<a href=" {{ route('scan.algemeenbeeldresultaten', $scan) }} " class="btn prev-next-nav--next">
    		volgende scherm >>
    	</a>
    </div>
    
    <scan-progress
        :scanmodel="{{ App\Scanmodel::with('themes.questions')->find($scan->scanmodel->id) }}"
        :workscan=" {{ $scan }} "
        :page="'algemeenbeeld'"
        >
    </scan-progress>
@endsection
