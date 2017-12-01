@extends('layouts.appcms')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <span class="breadcrumb"> <a href=" {{ route('home') }} ">Dashboard</a> > groep beheren </span>
            </div>
        </div>
        <groupmanager :workgroup="{{ $group }}"></groupmanager>
    </div>

@endsection
