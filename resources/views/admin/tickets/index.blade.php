@extends('admin.layouts.layout')
@section('title', 'Jegyek')
@section('icon', 'ticket')
@section('content')
    <div class="form-group">
        <a href="{{ route('admin.tickets.create') }}" class="btn btn-primary">Új jegy hozzáadása</a>
    </div>

    <div class="panel panel-default">
        <table class="table">
            <tr>
                <th>Név</th>
                <th>Ár</th>
                <th>Mennyiség</th>
                <th>Műveletek</th>
            </tr>
            @foreach($tickets as $ticket)
                <tr>
                    <td>{{ $ticket->name }}</td>
                    <td>{{ $ticket->price }} Ft</td>
                    <td>{{ $ticket->amount }} db</td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection