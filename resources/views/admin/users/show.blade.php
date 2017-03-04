@extends('admin.layouts.layout')
@section('title', 'Felhasználók')
@section('subtitle', $user->name)
@section('icon', 'users')
@section('content')

    <div class="row">

        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        Adatok
                    </h3>
                </div>
                <table class="table table-striped">
                    <tr>
                        <td>Név:</td>
                        <th class="text-right">{{ $user->name }}</th>
                    </tr>
                    <tr>
                        <td>E-mail cím:</td>
                        <th class="text-right">{{ $user->email }}</th>
                    </tr>
                    <tr>
                        <td>Iskola:</td>
                        <th class="text-right">{{ $user->unit }}</th>
                    </tr>
                </table>
            </div>
        </div>

        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        Foglalások
                    </h3>
                </div>
                <table class="table table-hover">
                    <tr>
                        <th>Jegytípus</th>
                        <th>Ár</th>
                        <th>Foglalás időpontja</th>
                        <th>Műveletek</th>
                    </tr>
                    @foreach($orders as $order)
                        @php($overAllPrice += $order->ticket->price)
                        <tr>
                            <td class="valign-middle">{{ $order->ticket->name}}</td>
                            <td class="valign-middle">{{ $order->ticket->price }} Ft</td>
                            <td class="valign-middle">{{ $order->created_at->format('Y. m. d. H:i') }}</td>
                            <td>
                                @if( $order->ticket->jug )
                                    <button class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Korsó felirata: {{ $order->jug_name }}">
                                        <i class="fa fa-beer" aria-hidden="true"></i>
                                    </button>
                                @endif
                                @if( !empty($order->comment) )
                                    <button class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="{{ $order->comment }}">
                                        <i class="fa fa-comment" aria-hidden="true"></i>
                                    </button>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    <tr>
                        <td></td>
                        <td><b>{{ $overAllPrice }} Ft</b></td>
                        <td colspan="2"></td>
                    </tr>
                </table>
            </div>
        </div>

    </div>

@endsection