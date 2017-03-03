@extends('admin.layouts.layout')
@section('title', 'Jegyek')
@section('icon', 'ticket')
@section('content')
    <div class="form-group">
        <a href="{{ route('admin.tickets.create') }}" class="btn btn-primary">Új jegy hozzáadása</a>
    </div>

    <div class="panel panel-default">
        <table class="table table-hover">
            <tr>
                <th>Név</th>
                <th>Ár</th>
                <th>Foglalt</th>
                <th>Műveletek</th>
            </tr>
            @foreach($tickets as $ticket)
                <tr>
                    <td class="valign-middle">{{ $ticket->name }}</td>
                    <td class="valign-middle">{{ $ticket->price }} Ft</td>
                    <td class="valign-middle">{{ $ticket->orders()->count() }}</td>
                    <td class="valign-middle">
                        <a href="{{ route('admin.tickets.edit', ['ticket' => $ticket]) }}" class="btn btn-primary" title="Szerkesztés">
                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                        </a>
                        <button class="btn btn-danger" data-toggle="modal" data-target="#modal" data-id="{{ $ticket->id }}" title="Törlés">
                            <i class="fa fa-trash-o" aria-hidden="true"></i>
                        </button>
                    </td>
                </tr>
            @endforeach
            <tr>
                <td></td>
                <td></td>
                <td>{{ App\Models\Order::count() }}</td>
                <td></td>
            </tr>
        </table>
    </div>

    @include('admin.tickets.delete-modal')
@endsection
@push('scripts')
    <script type="text/javascript">
        $('#modal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var id = button.data('id');

            var modal = $(this);
            modal.find('a#btnDelete').attr('href', '{{ route('admin.tickets.destroy', ['ticket' => null]) }}/' + id)
        })
    </script>
@endpush