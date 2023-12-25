<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item {{ request()->routeIs('home.dashboard') ? 'active' : '' }}" style="margin-left: 30px;">
                <a class="nav-link" href="{{ route('home.dashboard') }}">Stock Time Series</a>
            </li>
            <li class="nav-item {{ request()->routeIs('dashboard.forex') ? 'active' : '' }}" style="margin-left: 50px">
                <a class="nav-link" href="{{ route('dashboard.forex') }}">Forex(FX)</a>
            </li>
        </ul>
    </div>
</nav>
