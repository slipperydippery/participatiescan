@extends('layouts.appscan')
@section('title', 'Algemeen beeld resultaten')

@section('hintsmodal')

    <hintsmodal
        :active="true"
        :messages=" [
            'Hier zie je jouw ingevulde resultaat en de resultaten van andere deelnemers als je een groepsscan doet, of als je de scan vergelijkt met anderen.'
        ] "
        :loggedin=" {{ Auth::guest() ? 0 : Auth::user() }} "
    >
    </hintsmodal>
@endsection

@section('content')
    <div class="row">
    	<div class="col-md-12">
    		<h2 class="page--title"> Algemeen beeld resultaten</h2>

            @if(count($scan->group))
                <span class="page--clarification"> Niet om te bespreken, maar wel om alvast met elkaar te delen: wat is ons gevoel bij hoe we het in algemene zin doen in onze regio? </span>
            @elseif(Auth::guest())
                <span class="page--clarification"> Met een account kun je hier de score zien die je hebt ingevuld en jouw antwoord vergelijken met de groep of andere individuele scans. </span>
            @else
        		<span class="page--clarification"> Dit is het antwoord dat je gegeven hebt. Via het dashboard kun je jouw antwoorden vergelijken met andere deelnemers. </span>
            @endif
            
    	</div>
    </div>
    <div class="row content--page">
    	<div class="col-sm-12">
            <div class="row">
                <div class="col-sm-2">  </div>
                <div class="col-sm-2 table--instantie">  </div>
                <div class="col-sm-1 table--score"> score </div>
                <div class="col-sm-7">

                </div>
            </div>
            @if(count($scan->group))
                @foreach($scan->group->scans as $thisscan)
                    <div class="row">
                        <div class="col-sm-2"> {{ $thisscan->user->name }} </div>
                        <div class="col-sm-2 table--instantie"> {{ $thisscan->instantie->title }} </div>
                        <div class="col-sm-1 table--score"> {{ $thisscan->algemeenbeeld }} </div>
                        <div class="col-sm-7">
                            <input type="range" 
                                min="0" max="10"
                                step="0.1"
                                value="{{ $thisscan->algemeenbeeld }}" 
                                disabled
                            >
                        </div>
                    </div>
                @endforeach
            @else
                <div class="row">
                    <div class="col-sm-2"> {{ $scan->user->name }} </div>
                    <div class="col-sm-2 table--instantie"> {{ $scan->instantie->title }} </div>
                    <div class="col-sm-1 table--score"> {{ $scan->algemeenbeeld }} </div>
                    <div class="col-sm-7">
                        <input type="range" 
                            min="0" max="10"
                            step="0.1"
                            value="{{ $scan->algemeenbeeld }}" 
                            disabled
                        >
                    </div>
                </div>            
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
    
    <scan-progress
        :scanmodel="{{ App\Scanmodel::with('themes.questions')->find($scan->scanmodel->id) }}"
        :workscan=" {{ $scan }} "
        :page="'algemeenbeeldresultaten'"
        >
    </scan-progress>
@endsection
