<nav class="navbar sticky-top navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="#">GAS-SIKAT</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" aria-current="page" href="/">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('inovasi') ? 'active' : '' }}" href="/inovasi">Inovasi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('upload-inovasi') ? 'active' : '' }}" href="/upload-inovasi">Upload Inovasi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('tentang-kami') ? 'active' : '' }}" href="/tentang-kami">Tentang Kami</a>
                </li>
            </ul>
            <button class="btn btn-primary">Login</button>
        </div>
    </div>
</nav>