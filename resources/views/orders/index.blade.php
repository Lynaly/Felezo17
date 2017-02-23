@extends('layouts.layout')
@section('title', 'Jegyfoglalás')
@section('icon', 'ticket')
@section('content')

    <h2>Szabad helyek száma: {{ $free }}</h2>

    @if(Auth::check())
        @include('orders.orders')
    @else
        A jegyfoglaláshoz be kell jelentkezned az Auth.Sch fiókodba!<br>
        <a href="{{ route('auth.redirect', ['provider' => 'sch']) }}" class="btn btn-lg btn-primary">
            <i class="fa fa-sign-in" aria-hidden="true"></i>
            Bejelentkezés Auth.sch fiókkal
        </a>
    @endif
@endsection