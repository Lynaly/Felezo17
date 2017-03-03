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
                    <option value="{{ $ticket->id }}" data-jug="{{ $ticket->jug }}">{{ $ticket->name }} - {{ $ticket->price }} Ft</option>
                @endforeach
            </select>
        </div>

        <div class="form-group collapse">
            <label for="jug_name">Korsóra írt szöveg:</label>
            <input type="text" name="jug_name" id="jug_name" class="form-control" placeholder="Korsóra írt szöveg">
        </div>

        <div class="form-group">
            <label for="comment">Megjegyzés:</label>
            <textarea name="comment" id="comment" rows="5" class="form-control" placeholder="Megjegyzés"></textarea>
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
@push('scripts')
<script type="text/javascript">
    $(document).ready(function () {
        $("#ticket").on("change", function () {
            var jug = $("#ticket option:selected").data("jug");
            var jug_name = $("#jug_name");

            if( jug ) {
                jug_name.parent().show();
                jug_name.prop("required", true);
            } else {
                jug_name.parent().hide();
                jug_name.prop("required", false);
            }
        });
    });
</script>
@endpush