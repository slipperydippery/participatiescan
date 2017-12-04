@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <span class="breadcrumb"> Arbeidsregio ... </span>
            <h1 class="section--title"> Groepsscan: {{ $scan->group->title }} </h1>
        </div>
    </div>
    <div class="row">
    	<div class="col-md-12">
    		<h2 class="page--title"> Kennismaken </h2>
    		<span class="page--clarification">Is iedereen ingelogd? Neem even de tijd om iedereen te leren kennen.</span>
    	</div>
    </div>
    <div class="row content--page">
    	<div class="col-sm-12">
            <div class="row">
        		@foreach($scan->group->scans as $scan)
                    <div class="col-sm-2">
                        <div class="infoblock">
                            <span class="logged logged--in">ingelogd</span>
                            <img src="/img/user.svg" alt="">
                            <div class="infoblock--padded">
                                <span>{{ $scan->user->name }}</span>
                                <span class="center"><strong>...instantie...</strong></span>
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
