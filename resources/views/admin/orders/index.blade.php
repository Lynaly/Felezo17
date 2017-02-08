@extends('admin.layouts.layout')
@section('title', 'Jegyfoglalások')
@section('icon', 'usd')
@section('content')

    <div class="panel panel-default">
        <table class="table table-hover">
            <tr>
                <th>Foglaló</th>
                <th>Jegy</th>
                <th>Dátum</th>
            </tr>
            @foreach($orders as $order)
                <tr>
                    <td>
                        <a href="{{ route('admin.users.show', ['user' => $order->user]) }}">
                            {{ $order->user->name }}
                        </a>
                    </td>
                    <td>{{ $order->ticket->name }}</td>
                    <td>{{ $order->created_at->format('Y. m. d. H:i') }}</td>
                </tr>
            @endforeach
        </table>
    </div>

    {{ $orders->links() }}
@endsection