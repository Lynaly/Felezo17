@extends('layouts.base')
@section('body')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">@include('layouts.navbar')</div>
            <div class="col-md-6">
                @include('layouts.title')
                @yield('content')
            </div>
        </div>
    </div>
@endsection