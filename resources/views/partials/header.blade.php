<header class="header" data-header>
    <div class="container">
        <a href="#" class="logo">
            <img src="{{ asset('assets/images/rodeo.svg') }}" alt="Logo" />
        </a>
        <nav class="navbar container" data-navbar>
            <ul class="navbar-list">
                <li><a href="#" class="navbar-link" data-nav-link>Home</a></li>
                <li><a href="#service" class="navbar-link" data-nav-link>Services</a></li>
                <li><a href="#about" class="navbar-link" data-nav-link>About</a></li>
                <li><a href="#contact" class="navbar-link" data-nav-link>Contact Us</a></li>
                <li><a href="{{ route('login') }}" class="btn btn-primary">Get Started</a></li>
            </ul>
        </nav>

        <button class="nav-toggle-btn" aria-label="Toggle menu" data-nav-toggler>
            <ion-icon name="menu-outline" class="open"></ion-icon>
            <ion-icon name="close-outline" class="close"></ion-icon>
        </button>
    </div>
</header>