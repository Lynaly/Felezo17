@extends('admin.layouts.layout')
@section('title', 'Hírek')
@section('icon', 'newspaper-o')
@section('content')

    <div class="form-group">
        <a href="{{ route('admin.news.create') }}" class="btn btn-primary">Új hír hozzáadása</a>
    </div>

    <div class="panel panel-default">
        <table class="table table-hover">
            <tr>
                <th>Cím</th>
                <th>Szerző</th>
                <th>Dátum</th>
                <th>Műveletek</th>
            </tr>
            @foreach($news as $new)
                <tr>
                    <td class="valign-middle">
                        {{ $new->title }}
                    </td>
                    <td class="valign-middle">
                        <a href="{{ route('admin.users.show', ['user' => $new->user]) }}">
                            {{ $new->user->name }}
                        </a>
                    </td>
                    <td class="valign-middle">
                        {{ $new->created_at->format('Y. m. d. H:i') }}
                    </td>
                    <td>
                        <a href="{{ route('admin.news.edit', ['news' => $new]) }}" class="btn btn-primary">
                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                        </a>
                        <button class="btn btn-danger">
                            <i class="fa fa-trash-o" aria-hidden="true"></i>
                        </button>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>

    {{ $news->links() }}
@endsection