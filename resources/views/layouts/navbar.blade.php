<nav class="navbar">
    <div class="container-fluid">

        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <i class="fa fa-bars" aria-hidden="true"></i>
            </button>
            <a class="navbar-brand visible-xs" href="#">BME VIK Felező 2017</a>
        </div>

        <div class="collapse navbar-collapse" id="navbar">
            <ul class="nav nav-pills nav-stacked">

                <li @if(empty(Request::segment(1)))class="active"@endif>
                    <a href="{{ route('news.index') }}">Hírek</a>
                </li>

                <li @if(Request::segment(1) == 'programs' )class="active"@endif>
                    <a href="{{ route('programs.index') }}">Programok</a>
                </li>

                <li @if(Request::segment(1) == 'orders' )class="active"@endif>
                    <a href="{{ route('orders.index') }}">Jegyfoglalás</a>
                </li>

                <li @if(Request::segment(1) == 'location' )class="active"@endif>
                    <a href="{{ route('location.index') }}">Helyszín</a>
                </li>

                {{--
                @role('admin')
                    <li>
                        <a href="{{ route('admin.index') }}">Adminisztráció</a>
                    </li>
                @endrole

                @if(Auth::check())
                    <li>
                        <a href="{{ route('auth.logout') }}">Kijelentkezés</a>
                    </li>
                @else
                    <li>
                        <a href="{{ route('auth.redirect', ['provider' => 'sch']) }}">Bejelentkezés</a>
                    </li>
                @endif
                --}}
            </ul>
        </div>
    </div>
</nav>