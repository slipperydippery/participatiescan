@extends('layouts.appcms')

@section('content')

    <div class="container container--page">
        <div class="row">
            <div class="col-sm-12">
                <span class="breadcrumb"> <a href=" {{ route('home') }} ">Dashboard</a> > vergelijk scans </span>
            </div>
        </div>
        <comparemanager
        	:user=" {{ $user }} "	
        	:districts=" {{ $districts }} "
        >
        </comparemanager>
    </div>

@endsection
