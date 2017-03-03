@extends('layouts.base')
@section('body')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">@include('layouts.navbar')</div>
            <div class="col-md-8" style="margin-top: 23em">
                @include('layouts.title')
                @yield('content')
            </div>
        </div>
    </div>
@endsection