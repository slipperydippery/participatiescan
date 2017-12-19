@extends('layouts.appcms')

@section('content')
<div class="container container--page">
    <div class="row">
        <div class="col-md-12">
            <div class="page--title">
                <h1 class="pagetitle">Dashboard</h1>
            </div>
        </div>
    </div>
        <dashmessages :user="{{ $user }}"></dashmessages>
    <div class="row">
        <div class="col-md-4 dashboard--column">
            <a href=" {{ route('scan.create') }} " title="Doe individueel een scan">
                <div class="dashboard--item">
                    <div class="dashboard--item--head">Nieuwe scan</div>
                    <div class="dashboard--item--body"><img src="/img/newscan.svg" alt=""></div>
                </div>
            </a>
            <a href=" {{ route('group.create') }} " title="Doe de scan samen met een groep">
                <div class="dashboard--item">
                    <div class="dashboard--item--head">Nieuwe groep</div>
                    <div class="dashboard--item--body"><img src="/img/newgroup.svg" alt=""></div>
                </div>
            </a>
            <div class="dashboard--item" title="De participatiescan in beeld">
                <div class="dashboard--item--head">Instructiefilms</div>
                <div class="dashboard--item--body"><img src="/img/movie.svg" alt=""></div>
            </div>
        </div>
        <div class="col-md-4 dashboard--column">
            <div class="dashboard--item" title="Beheer je scans">
                <div class="dashboard--item--head">Mijn scans</div>
                <div class="dashboard--item--body autoscroll">
                    @foreach($user->scans as $scan)
                        @if(! count($scan->owns))
                            <?php 
                                $answercount = 0;
                                foreach($scan->answers as $answer) {
                                    if ($answer->answer != null) {
                                        $answercount++;
                                    }
                                }
                            ?>
                            <div class="col-sm-12">
                                <div class="row no-overflow">
                                    <div class="col-sm-8 hidden--container">
                                        @if(count($scan->group))
                                            <a href=" {{ route('scan.show', $scan) }} "> {{ $scan->group->owner->title }}</a> 
                                        @else
                                            <a href=" {{ route('scan.show', $scan) }} "> {{ $scan->title }}</a> 
                                        @endif
                                        <img src="/img/editicon-color.svg" title="bewerk deze scan" class="rowicon hidden--item">
                                    </div>
                                    <div class="col-sm-2" title=" <?= $answercount; ?> van de 15 vragen zijn beantwoord  "> <?= $answercount; ?>/15 </div>
                                    <div class="col-sm-2 rowicons"> 
                                        @if(count($scan->group))
                                            <img src="/img/group.svg" title="Deze scan is onderdeel van groep '{{ $scan->group->title }}'" class="rowicon">
                                        @endif
                                        @if(count($scan->grouprequest))
                                            <img src="/img/grouppending.svg" title="Een verzoek is naar group '{{ $scan->grouprequest->group->title }}' verzonden" class="rowicon">
                                        @endif
                                        
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="dashboard--item" title="Beheer je groepen">
                <div class="dashboard--item--head">Mijn groepen</div>
                <div class="dashboard--item--body">
                    @foreach($user->groups as $group)
                        <div class="row">
                            <div class="col-sm-7">
                                <a href=" {{ route('group.show', $group) }} ">{{ $group->title }}</a>
                            </div>
                            <div class="col-sm-3"> {{ $group->scans->count() }} </div>

                        </div>
                    @endforeach
                </div>
            </div>
            <div class="dashboard--item" title="Inspirerende praktijkvoorbeelden, tools en links">
                <div class="dashboard--item--head">Kennisbank</div>
                <div class="dashboard--item--body"><img src="/img/books.svg" alt=""></div>
            </div>
        </div>
        <div class="col-md-4 dashboard--column">
            <a href=" {{ route('comparescans') }} " title="Vergelijk jouw scan met andere deelnemers">
                <div class="dashboard--item">
                    <div class="dashboard--item--head">Scans vergelijken</div>
                    <div class="dashboard--item--body"><img src="/img/scales.svg" alt=""></div>
                </div>
            </a>
            <div class="dashboard--item dashboard--item--doubleheight" title="NEET-rate en risico's per arbeidsmarktregio">
                <div class="dashboard--item--head">Cijfers uit jouw regio</div>
                <div class="dashboard--item--body"><img src="/img/nederlandlarge.svg" alt=""></div>
            </div>
        </div>
    </div>
</div>
@endsection
