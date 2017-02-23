@if( isset($ownOrders) && count($ownOrders) )
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Foglalásaim</h3>
        </div>
        <table class="table table-hover">
            <tr>
                <th>Jegytípus</th>
                <th>Ár</th>
                <th>Foglalás időpontja</th>
                <th>Törlés</th>
            </tr>
            @foreach($ownOrders as $order)
                @php($overAllPrice += $order->ticket->price)
                <tr>
                    <td class="valign-middle">{{ $order->ticket->name}}</td>
                    <td class="valign-middle">{{ $order->ticket->price }} Ft</td>
                    <td class="valign-middle">{{ $order->created_at->format('Y. m. d. H:i') }}</td>
                    <td>
                        <a href="{{ route('orders.destroy', ['order' => $order]) }}" class="btn btn-danger" title="Törlés">
                            <i class="fa fa-times" aria-hidden="true"></i>
                        </a>
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
@endif

<p>Maximum <b>{{ env('MAX_TICKETS_PER_USER') }}</b> db jegyet tudsz lefoglalni <i>(jegy típustól függetlenül)</i>.</p>

@if( count($ownOrders) < 5 && $free > 0)
    <div class="form-group">
        <a href="{{ route('orders.order') }}" class="btn btn-primary">Tovább a foglaláshoz</a>
    </div>
@endif