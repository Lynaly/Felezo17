@extends('layouts.base')
@section('body')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-4">@include('layouts.navbar')</div>
            <div class="col-sm-8 col-content">
                @include('layouts.title')
                @yield('content')
            </div>
        </div>
    </div>
@endsection