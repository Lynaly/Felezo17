@extends('admin.layouts.layout')
@section('title', '403')
@section('content')
    <h3 class="text-center">403 - Hozzáférés megtagadva</h3>
    <p class="text-center">
        <a href="{{ route('auth.redirect', 'sch') }}">Bejelentkezés</a>
    </p>
@endsection