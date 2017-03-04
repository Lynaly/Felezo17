@extends('admin.layouts.layout')
@section('title', 'Adminisztráció')
@section('icon', 'eye')
@section('content')
    @if( $display )
        <div id="orders"></div>
        @columnchart('Orders', 'orders')
    @endif
@endsection