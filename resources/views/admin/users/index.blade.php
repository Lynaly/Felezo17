@extends('admin.layouts.layout')
@section('title', 'Felhasználók')
@section('icon', 'users')
@section('content')
    <div class="panel panel-default">
        <table class="table">
            <tr>
                <th>Név</th>
                <th>E-mail cím</th>
            </tr>
            @foreach($users as $user)
                <tr>
                    <td>
                        <a href="{{ route('admin.users.show', ['user' => $user]) }}">
                            {{ $user->name }}
                        </a>
                    </td>
                    <td>{{ $user->email }}</td>
                </tr>
            @endforeach
        </table>
    </div>
    {{ $users->links() }}
@endsection