@extends('layouts.layout')
@section('title', 'Jegyfoglalás')
@section('icon', 'ticket')
@section('content')
    <form method="post" action="{{ route('orders.placeAnOrder') }}">
        {{ csrf_field() }}

        <div class="form-group">
            <label for="ticket">Jegytípus:</label>
            <select name="ticket" id="ticket" class="form-control">
                @foreach($availableTickets as $ticket)
                    <option value="{{ $ticket->id }}">{{ $ticket->name }} - {{ $ticket->price }} Ft</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <div class="btn-group btn-group-justified" role="group">
                <div class="btn-group" role="group">
                    <a href="{{ route('orders.index') }}" class="btn btn-default">Vissza</a>
                </div>
                <div class="btn-group" role="group">
                    <button type="submit" class="btn btn-primary">Foglalás</button>
                </div>
            </div>
        </div>

    </form>
@endsection