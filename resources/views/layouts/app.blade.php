<!DOCTYPE html>
<html lang="en">
@include('partials.head')
<body class="index">
    @yield('content')

    <!-- back to top button -->
    <a href="#top" aria-label="back to top" data-back-top-btn class="back-top-btn">
        <ion-icon name="chevron-up" aria-hidden="true"></ion-icon>
    </a>

    <!-- JS -->
    <script src="{{ asset('assets/js/app.js') }}"></script>

    <!-- Iconicon website -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>
