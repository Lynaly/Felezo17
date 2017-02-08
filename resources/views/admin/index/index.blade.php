@extends('admin.layouts.layout')
@section('title', 'Adminisztráció')
@section('icon', 'eye')
@section('content')
    <div id="orders"></div>
    @columnchart('Orders', 'orders')
@endsection