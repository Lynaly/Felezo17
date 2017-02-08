@extends('layouts.layout')
@section('title', 'Bejelentkezés')
@section('icon', 'sign-in')
@section('content')

    <p class="text-center">
        <a href="{{ route('auth.redirect', ['provider' => 'sch']) }}" class="btn btn-lg btn-primary">
            <i class="fa fa-sign-in" aria-hidden="true"></i>
            Bejelentkezés Auth.sch fiókkal
        </a>
    </p>

@endsection