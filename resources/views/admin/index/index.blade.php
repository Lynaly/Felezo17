@extends('admin.layouts.layout')
@section('title', 'Adminisztráció')
@section('icon', 'eye')
@section('content')
    @if( $display )
        <div id="div_orders"></div>
        @columnchart('Orders', 'div_orders')
        {{-- @php(Lava::render('ColumnChart', 'Orders', 'div_orders')) --}}
    @endif
@endsection