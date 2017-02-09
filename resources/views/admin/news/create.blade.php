@extends('admin.layouts.layout')
@section('title', 'Hírek')
@section('subtitle', 'Új hír hozzáadása')
@section('title', 'newspaper-o')
@section('content')

    <!--<div class="row">
        <div class="col-md-6 col-md-offset-3">-->

            <form method="post" action="{{ route('admin.news.store') }}" >
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="title">Cím:</label>
                    <input type="text" name="title" id="title" class="form-control" required="required" placeholder="Cím" value="{{ old('title') }}">
                </div>

                <div class="form-group">
                    <label for="body">Tartalom:</label>
                    <textarea name="body" id="body" rows="15" class="form-control" placeholder="Tartalom">{{ old('body') }}</textarea>
                </div>

                <div class="form-group">
                    <div class="btn-group btn-group-justified" role="group">
                        <div class="btn-group" role="group">
                            <a href="{{ route('admin.news.index') }}" class="btn btn-default">Vissza</a>
                        </div>
                        <div class="btn-group" role="group">
                            <button type="submit" class="btn btn-primary">Mentés</button>
                        </div>
                    </div>
                </div>
            </form>

    <!--    </div>
    </div>-->

@endsection