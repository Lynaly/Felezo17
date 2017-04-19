@extends('layouts.layout')
@section('title', 'Jegyfoglalás')
@section('icon', 'ticket')
@section('content')

    <h2>A jegyfoglalás lezárult!</h2>

    {{--}}<h2>Szabad helyek száma: {{ $free }}</h2> --}}

    @if(Auth::check())
        @include('orders.orders')
    @else
        {{--}}<p>A jegyfoglaláshoz be kell jelentkezned az Auth.Sch fiókodba!</p> --}}
        <a href="{{ route('auth.redirect', ['provider' => 'sch']) }}" class="btn btn-lg btn-primary">
            <i class="fa fa-sign-in" aria-hidden="true"></i>
            Bejelentkezés Auth.sch fiókkal
        </a>
    @endif
@endsection
@push('scripts')
<script type="text/javascript">
    $(document).ready(function () {
        $('[data-toggle="tooltip"]').tooltip()
    });
</script>
@endpush