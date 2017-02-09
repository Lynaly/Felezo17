@extends('layouts.layout')
@section('body')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">@include('admin.layouts.navbar')</div>
            <div class="col-md-6">
                @include('layouts.title')
                @yield('content')
            </div>
        </div>
    </div>
@endsection