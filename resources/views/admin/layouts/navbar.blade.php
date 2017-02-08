<nav class="navbar navbar-default">
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

                <li>
                    <a href="{{ route('news.index') }}">Vissza a főoldalra</a>
                </li>

                <li @if(Request::segment(2) == 'users' )class="active"@endif>
                    <a href="{{ route('admin.users.index') }}">Felhasználók</a>
                </li>

                <li @if(Request::segment(2) == 'orders' )class="active"@endif>
                    <a href="{{ route('admin.orders.index') }}">Jegyek</a>
                </li>


            </ul>
        </div>
    </div>
</nav>