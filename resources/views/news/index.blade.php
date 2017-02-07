@extends('layouts.layout')
@section('title', 'Hírek')
@section('content')
    home
    @if(Auth::check())
        <a href="{{ route('auth.logout') }}">Kilépés</a>
    @else
        <a href="{{ route('auth.redirect', ['provider' => 'sch']) }}">Belépés</a>
    @endif

@endsection