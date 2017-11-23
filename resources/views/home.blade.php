@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="page--title">
                <h1 class="title">Dashboard</h1>
            </div>
        </div>
        <div class="col-md-4 dashboard--column">
            <div class="dashboard--item">
                <div class="dashboard--item--head">Nieuwe scan</div>
                <div class="dashboard--item--body"><img src="/img/books.png" alt=""></div>
            </div>
            <div class="dashboard--item">
                <div class="dashboard--item--head">Nieuwe groep</div>
                <div class="dashboard--item--body">body</div>
            </div>
            <div class="dashboard--item">
                <div class="dashboard--item--head">Films</div>
                <div class="dashboard--item--body">body</div>
            </div>
        </div>
        <div class="col-md-4 dashboard--column">
            <div class="dashboard--item">
                <div class="dashboard--item--head">Overzicht scans</div>
                <div class="dashboard--item--body">body</div>
            </div>
            <div class="dashboard--item">
                <div class="dashboard--item--head">Overzicht groepen</div>
                <div class="dashboard--item--body">body</div>
            </div>
            <div class="dashboard--item">
                <div class="dashboard--item--head">Kennisbank</div>
                <div class="dashboard--item--body">body</div>
            </div>
        </div>
        <div class="col-md-4 dashboard--column">
            <div class="dashboard--item">
                <div class="dashboard--item--head">Scans vergelijken</div>
                <div class="dashboard--item--body">body</div>
            </div>
            <div class="dashboard--item dashboard--item--doubleheight">
                <div class="dashboard--item--head">ParticipatieKaart</div>
                <div class="dashboard--item--body">body</div>
            </div>
        </div>
    </div>
</div>
@endsection
