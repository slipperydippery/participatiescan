@extends('layouts.app')

@section('content')
<div class="container container--page">
    <div class="row">
        <div class="col-md-12">
            <span class="breadcrumb"> Arbeidsmarktregio: {{ $scan->group->district->districtmodel->title }} </span>
            <h1 class="section--title"> Groepsscan: {{ $scan->group->title }} </h1>
        </div>
    </div>
    <div class="row">
    	<div class="col-md-12">
    		<h2 class="page--title"> Kennismaken </h2>
    		<span class="page--clarification">Vaak zal niet iedereen elkaar kennen. Daarom een voorstelrondje, waarbij iedereen aangeeft: wie ben je, namens welke organisatie doe je mee, je rol/functie en wat je hoopt dat uit deze sessie komt (wens of droom).</span>

    	</div>
    </div>
    <div class="row content--page">
    	<div class="col-sm-12">
            <div class="row">
        		@foreach($scan->group->scans as $thisscan)
                    <div class="col-sm-2">
                        <div class="infoblock">
                            <span class="logged logged--in">ingelogd</span>
                            <img src="/img/user.svg" alt="">
                            <div class="infoblock--padded">
                                <span>{{ $thisscan->user->name }}</span>
                                <span class="center"><strong> {{ $thisscan->instantie->instantiemodel->title }} </strong></span>
                            </div>
                            
                        </div>
                    </div>
                @endforeach
                
            </div>
    	</div>
    </div>
    <div class="prev-next-nav">
    	<a href="#" class="btn prev-next-nav--prev">
    		<< vorige scherm
    	</a>
    	<a href=" {{ route('scan.regioincijfers', $scan) }} " class="btn prev-next-nav--next">
    		volgende scherm >>
    	</a>
    </div>
</div>
@endsection
