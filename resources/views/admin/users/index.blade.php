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
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                </tr>
            @endforeach
        </table>
    </div>
    {{ $users->links() }}
@endsection