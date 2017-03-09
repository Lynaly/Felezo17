@extends('admin.layouts.layout')
@section('title', 'Felhasználók')
@section('icon', 'users')
@section('content')
    <p>
        <a href="{{ route('admin.users.export.csv') }}" class="btn btn-primary">.csv export</a>
    </p>

    <div class="panel panel-default">
        <table class="table">
            <tr>
                <th>Név</th>
                <th>E-mail cím</th>
                <th>Műveletek</th>
            </tr>
            @foreach($users as $user)
                <tr>
                    <td class="valign-middle">
                        <a href="{{ route('admin.users.show', ['user' => $user]) }}">
                            {{ $user->name }}
                        </a>
                    </td>
                    <td class="valign-middle">
                        {{ $user->email }}
                    </td>
                    <td>
                        @if( $user->isParticipant() )
                            <a href="{{ route('admin.users.demote.participant', ['user' => $user]) }}" class="btn btn-danger" title="Résztvevő jogosultság visszavonása">
                                <i class="fa fa-user" aria-hidden="true"></i>
                            </a>
                        @else
                            <a href="{{ route('admin.users.promote.participant', ['user' => $user]) }}" class="btn btn-primary" title="Kinevezés résztvevővé">
                                <i class="fa fa-user-o" aria-hidden="true"></i>
                            </a>
                        @endif
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
    {{ $users->links() }}
@endsection