@extends('layouts.app')

@section('content')
<div class="container">
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
    		<h2 class="page--title"> Algemeen beeld </h2>
    		<span class="page--clarification"> Beoordeel de huidige aanpak </span>
    	</div>
    </div>
    <div class="row content--page">
    	<div class="col-sm-12">
            <algemeenbeeld :workscan=" {{ $scan }} "></algemeenbeeld>
    	</div>
    </div>
    <div class="prev-next-nav">
    	<a href="#" class="btn prev-next-nav--prev">
    		<< vorige scherm
    	</a>
    	<a href=" {{ route('scan.algemeenbeeldresultaten', $scan) }} " class="btn prev-next-nav--next">
    		volgende scherm >>
    	</a>
    </div>
</div>
@endsection
