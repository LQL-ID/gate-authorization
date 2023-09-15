{{-- Header --}}
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="#">Gate Authorization</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ms-auto">
                @auth
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('dashboard.welcome') ? 'active' : '' }}" aria-current="page" href="{{ route('dashboard.welcome') }}">Welcome</a>
                </li>
                @endauth
                @can('admin')
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('dashboard.user-data') ? 'active' : '' }}" aria-current="page" href="{{ route('dashboard.user-data') }}">User Data</a>
                </li>
                @endcan
                @can('manager')
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('dashboard.user-roles') ? 'active' : '' }}" href="{{ route('dashboard.user-roles') }}">User Group By Roles</a>
                </li>
                @endcan
                @can('user')
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('dashboard.count-user-roles') ? 'active' : '' }}" href="{{ route('dashboard.count-user-roles') }}">Count Current User and Roles</a>
                </li>
                @endcan
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        @guest
                        Credentials
                        @endguest
                        @auth
                            {{ Auth::user()->email }}
                        @endauth
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        @guest
                        <li><a class="dropdown-item" href="{{ route('login.form') }}">Login</a></li>
                        @endguest
                        @auth
                        <li><a class="dropdown-item" href="{{ route('login.destroy') }}">Logout</a></li>
                        @endauth
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
