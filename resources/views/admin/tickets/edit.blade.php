@extends('admin.layouts.layout')
@section('title', 'Jegyek')
@section('subtitle', $ticket->name . ' szerkesztése')
@section('icon', 'ticket')
@section('content')

    <div class="row">
        <div class="col-md-6 col-md-offset-3">

            <form method="post" action="{{ route('admin.tickets.update', ['ticket' => $ticket]) }}">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="name">Név:</label>
                    <input type="text" name="name" class="form-control" required="required" placeholder="Név" value="{{ old('name', $ticket->name) }}">
                </div>

                <div class="form-group">
                    <label for="price">Ár:</label>
                    <div class="input-group">
                        <input type="number" name="price" min="0" class="form-control" required="required" placeholder="Ár" value="{{ old('price', $ticket->price) }}">
                        <span class="input-group-addon">Ft</span>
                    </div>
                </div>

                <div class="form-group">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="jug" value="1" {{ old('jug', $ticket->jug) == true ? 'checked="checked"' : '' }}> Korsó jár hozzá
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <div class="btn-group btn-group-justified" role="group">
                        <div class="btn-group" role="group">
                            <a href="{{ route('admin.tickets.index') }}" class="btn btn-default">Vissza</a>
                        </div>
                        <div class="btn-group" role="group">
                            <button type="submit" class="btn btn-primary">Mentés</button>
                        </div>
                    </div>
                </div>

            </form>

        </div>
    </div>

@endsection