@extends('layouts.appcms')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="page--title">
                <h1 class="title">Dashboard</h1>
            </div>
        </div>
        <div class="col-md-4 dashboard--column">
            <a href=" {{ route('scan.create') }} ">
                <div class="dashboard--item">
                    <div class="dashboard--item--head">Nieuwe scan</div>
                    <div class="dashboard--item--body"><img src="/img/newscan.svg" alt=""></div>
                </div>
            </a>
            <a href=" {{ route('group.create') }} ">
                <div class="dashboard--item">
                    <div class="dashboard--item--head">Nieuwe groep</div>
                    <div class="dashboard--item--body"><img src="/img/newgroup.svg" alt=""></div>
                </div>
            </a>
            <div class="dashboard--item">
                <div class="dashboard--item--head">Films</div>
                <div class="dashboard--item--body"><img src="/img/movie.svg" alt=""></div>
            </div>
        </div>
        <div class="col-md-4 dashboard--column">
            <div class="dashboard--item">
                <div class="dashboard--item--head">Overzicht scans</div>
                <div class="dashboard--item--body">
                    @foreach($user->scans as $scan)
                        <?php 
                            $answercount = 0;
                            foreach($scan->answers as $answer) {
                                if ($answer->answer != null) {
                                    $answercount++;
                                }
                            }
                        ?>
                        <div class="row">
                            <a href=" {{ route('scan.show', $scan) }} "><div class="col-sm-7">{{ $scan->title }}</div></a>
                            <div class="col-sm-3"> <?= $answercount ?> /15 </div>
                            <div class="col-sm-2">  </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="dashboard--item">
                <div class="dashboard--item--head">Overzicht groepen</div>
                <div class="dashboard--item--body">
                    @foreach($user->groups as $group)
                        {{ $group->title }}
                    @endforeach
                </div>
            </div>
            <div class="dashboard--item">
                <div class="dashboard--item--head">Participatiealmanak</div>
                <div class="dashboard--item--body"><img src="/img/books.svg" alt=""></div>
            </div>
        </div>
        <div class="col-md-4 dashboard--column">
            <div class="dashboard--item">
                <div class="dashboard--item--head">Scans vergelijken</div>
                <div class="dashboard--item--body"><img src="/img/scales.svg" alt=""></div>
            </div>
            <div class="dashboard--item dashboard--item--doubleheight">
                <div class="dashboard--item--head">ParticipatieKaart</div>
                <div class="dashboard--item--body"><img src="/img/nederlandlarge.svg" alt=""></div>
            </div>
        </div>
    </div>
</div>
@endsection
