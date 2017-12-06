@extends('layouts.app')

@section('content')
<div class="container container--page">
    <div class="row">
        <div class="col-md-12">
            <span class="breadcrumb"> Arbeidsregio ... </span>
            @if(count($scan->group))
                <h1 class="section--title"> Groepsscan: {{ $scan->group->title }} </h1>
            @else
                <h1 class="section--title">{{ $scan->title }} </h1>
            @endif
        </div>
    </div>
    <div class="row">
    	<div class="col-md-12">
    		<h2 class="page--title"> Algemeen beeld resultaten.</h2>
    		<span class="page--clarification"> Bespreek met elkaar wat je van de gezamelijke huidige aanpak vindt. </span>
    	</div>
    </div>
    <div class="row content--page">
    	<div class="col-sm-12">
            @if(count($scan->group))
                    <div class="row">
                        <div class="col-sm-2">  </div>
                        <div class="col-sm-2 table--instantie">  </div>
                        <div class="col-sm-1 table--score"> score </div>
                        <div class="col-sm-7">

                        </div>
                    </div>
                @foreach($scan->group->scans as $thisscan)
                    <div class="row">
                        <div class="col-sm-2"> {{ $thisscan->user->name }} </div>
                        <div class="col-sm-2 table--instantie"> {{ $thisscan->instantie->instantiemodel->title }} </div>
                        <div class="col-sm-1 table--score"> {{ $thisscan->algemeenbeeld }} </div>
                        <div class="col-sm-7">
                            <input type="range" 
                                min="0" max="100"
                                value="{{ $thisscan->algemeenbeeld }}" 
                                disabled
                            >
                        </div>
                    </div>
                @endforeach
            @endif
            
    	</div>
    </div>
    <div class="prev-next-nav">
    	<a href=" {{ route('scan.algemeenbeeld', $scan ) }} " class="btn prev-next-nav--prev">
    		<< vorige scherm
    	</a>
    	<a href=" {{ route('scan.showscan', $scan) }} " class="btn prev-next-nav--next">
    		volgende scherm >>
    	</a>
    </div>
</div>
@endsection
