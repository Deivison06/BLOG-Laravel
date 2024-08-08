<div class="container-fluid">
    <!-- Navbar brand -->
    <a class="navbar-brand" target="_blank" href="https://mdbootstrap.com/docs/standard/">
        <img src="https://mdbootstrap.com/img/logo/mdb-transaprent-noshadows.png" height="16" alt=""
            loading="lazy" style="margin-top: -3px;" />
    </a>
    <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarExample01"
        aria-controls="navbarExample01" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fas fa-bars"></i>
    </button>
    <div class="collapse navbar-collapse d-flex justify-content-between" id="navbarExample01">
        <ul class="navbar-nav mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" aria-current="page"
                    href="{{ route('home') }}">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('posts.*') ? 'active' : '' }}"
                    href="{{ route('posts') }}">Posts</a>
            </li>
            @guest
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('login') ? 'active' : '' }}"
                        href="{{ route('login') }}">Login</a>
                </li>
            @endguest
        </ul>

        <form action="{{ route('home') }}" method="get" class="d-flex justify-content-center  mx-3">
            <input type="text" name="s" placeholder="O que deseja buscar?"
                value="{{ request()->input('s') ?? '' }}" class="form-control me-2">
            <button type="submit" class="btn btn-dark">Buscar</button>
        </form>

        <div class="navbar-text d-flex align-items-center">
            @auth
                <span class="me-2">Bem vindo, {{ auth()->user()->fullName }}</span>
                <a href="{{ route('logout') }}" class="btn btn-sm btn-outline-secondary">Logout</a>
            @else
                <span>Bem vindo, Guest</span>
            @endauth
        </div>
    </div>
</div>
