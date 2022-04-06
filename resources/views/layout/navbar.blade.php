<nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-5">
    <div class="container-fluid">
        <a class="navbar-brand" href="/"><i class="fa-solid fa-book-atlas"></i> PPDB SMK Indonesia</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarColor01">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('/') ? 'active' : ''}}" href="/">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('/registration-report') ? 'active' : ''}}" href="/registration-report">Data Registrasi</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
