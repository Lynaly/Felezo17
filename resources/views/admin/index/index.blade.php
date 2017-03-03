@extends('admin.layouts.layout')
@section('title', 'Adminisztráció')
@section('icon', 'eye')
@section('content')
    @if( App\Models\Ticket::count() && App\Models\Order::count() )
        <div id="orders"></div>
        @columnchart('Orders', 'orders')
    @endif
@endsection