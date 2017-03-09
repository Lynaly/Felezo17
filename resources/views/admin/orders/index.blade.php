@extends('admin.layouts.layout')
@section('title', 'Jegyfoglalások')
@section('icon', 'usd')
@section('content')

    <p>
        <a href="{{ route('admin.orders.export.csv') }}" target="_blank" class="btn btn-primary">
            <i class="fa fa-file-excel-o" aria-hidden="true"></i> .csv export
        </a>
    </p>

    <div class="panel panel-default">
        <table class="table table-hover">
            <tr>
                <th>Foglaló</th>
                <th>Jegy</th>
                <th>Dátum</th>
                <th>Egyéb</th>
            </tr>
            @foreach($orders as $order)
                <tr>
                    <td class="valign-middle">
                        <a href="{{ route('admin.users.show', ['user' => $order->user]) }}">
                            {{ $order->user->name }}
                        </a>
                    </td>
                    <td class="valign-middle">{{ $order->ticket->name }}</td>
                    <td class="valign-middle">{{ $order->created_at->format('Y. m. d. H:i') }}</td>
                    <td>
                        @if( $order->ticket->jug )
                            <button type="button" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Korsó felirat: {{ $order->jug_name }}">
                                <i class="fa fa-beer" aria-hidden="true"></i>
                            </button>
                        @endif
                        @if( $order->comment != null && !empty($order->comment) )
                            <button type="button" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Megjegyzés: {{ $order->comment }}">
                                <i class="fa fa-comment" aria-hidden="true"></i>
                            </button>
                        @endif
                        <a href="{{ route('admin.orders.destroy', ['order' => $order]) }}" class="btn btn-danger" title="Foglalás törlése">
                            <i class="fa fa-trash" aria-hidden="true"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>

    {{ $orders->links() }}
@endsection
@push('scripts')
<script type="text/javascript">
    $(document).ready(function () {
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>
@endpush