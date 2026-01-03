<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Oficjalny dystrybutor części zamiennych do animatroniki. Buduj, naprawiaj, ożywiaj. Dostawa 24h, bezpieczne, dostępne dla wszystkich użytkowników.">
    <meta name="keywords" content="animatronica, części zamienne, dystrybutor, dostawa, sklep">
    <meta name="author" content="Animatronic Parts">
    <meta name="accessibility" content="WCAG 2.1 AA">
    <meta name="color-scheme" content="dark light">
    <title>Animatronic Parts - Panel</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700&family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary-color: #9d4edd;
            --accent-color: #00e5ff;
            --bg-dark: #121212;
            --card-bg: #1e1e24;
            --text-main: #f0f0f0;
            --text-muted: #adb5bd;
        }

        *:focus-visible {
            outline: 3px solid #ffcc00 !important;
            outline-offset: 2px;
        }

        body {
            background-color: var(--bg-dark);
            color: var(--text-main);
            font-family: 'Roboto', sans-serif;
            line-height: 1.8;
            font-size: 16px;
            letter-spacing: 0.5px;
            word-spacing: 0.2em;
        }

        h1, h2, h3, h4, h5, .navbar-brand, .btn-custom {
            font-family: 'Orbitron', sans-serif;
            letter-spacing: 1px;
        }

        .text-muted { color: #c0c0c0 !important; }

        h1 { font-size: 2.5rem; font-weight: 700; margin: 1rem 0; }
        h2 { font-size: 2rem; font-weight: 700; margin: 0.875rem 0; }
        h3 { font-size: 1.75rem; font-weight: 600; margin: 0.875rem 0; }

        body.high-contrast {
            background-color: #000000 !important;
            color: #ffff00 !important;
        }

        body.high-contrast .text-muted,
        body.high-contrast .text-secondary,
        body.high-contrast p,
        body.high-contrast span {
            color: #ffff00 !important;
        }

        body.high-contrast .navbar, 
        body.high-contrast .card,
        body.high-contrast footer,
        body.high-contrast .border {
            background-color: #000000 !important;
            border-color: #ffff00 !important;
        }

        body.high-contrast a, 
        body.high-contrast i,
        body.high-contrast .price-tag,
        body.high-contrast .nav-link,
        body.high-contrast h1, 
        body.high-contrast h2, 
        body.high-contrast h3, 
        body.high-contrast h4, 
        body.high-contrast h5 {
            color: #ffff00 !important;
        }

        body.large-font {
            font-size: 1.7rem !important;
        }

        body.large-font h1 { font-size: 4rem; }
        body.large-font h3, body.large-font h5 { font-size: 1.8rem; }
        body.large-font .btn { font-size: 1.2rem; }

        .navbar {
            background-color: rgba(18, 18, 18, 0.98);
            border-bottom: 1px solid #444;
        }

        .navbar-brand {
            color: var(--accent-color) !important;
            font-size: 1.5rem;
        }

        a {
            color: #00e5ff;
            text-decoration: underline;
        }

        a:hover {
            color: #ffffff;
            text-decoration: underline double;
        }

        .navbar-nav .nav-link {
            color: #e0e0e0 !important;
            transition: color 0.2s ease;
        }

        .navbar-nav .nav-link:hover,
        .navbar-nav .nav-link:focus-visible {
            color: #ffffff !important;
        }

        footer {
            background: linear-gradient(135deg, rgba(18, 18, 18, 0.95), rgba(30, 30, 36, 0.95));
            border-top: 3px solid var(--primary-color);
            padding-top: 2rem;
            padding-bottom: 1rem;
            margin-top: 3rem;
        }

        #a11y-panel {
            position: fixed;
            top: 100px;
            right: 0;
            background: #fff;
            color: #000;
            padding: 15px;
            border-radius: 10px 0 0 10px;
            z-index: 1000;
            box-shadow: -2px 2px 10px rgba(0,0,0,0.5);
            transform: translateX(85%);
            transition: transform 0.3s;
            min-width: 200px;
        }

        #a11y-panel:hover, #a11y-panel:focus-within {
            transform: translateX(0);
        }

        #a11y-panel button {
            display: block;
            width: 100%;
            margin-bottom: 8px;
            font-size: 0.9rem;
            min-height: 44px;
            border-radius: 4px;
        }

        .a11y-icon {
            position: absolute;
            left: -35px;
            top: 0;
            background: #fff;
            padding: 8px;
            border-radius: 5px 0 0 5px;
            cursor: pointer;
            font-size: 1.5rem;
            min-height: 44px;
            min-width: 44px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        @media (prefers-reduced-motion: reduce) {
            * {
                animation-duration: 0.01ms !important;
                animation-iteration-count: 1 !important;
                transition-duration: 0.01ms !important;
            }
        }
    </style>
</head>

<body>
    <a href="#main-content" class="skip-link" style="display: block; position: relative; background: #ffcc00; color: #000; text-align: center; padding: 5px 0; font-weight: bold; text-decoration: none; font-size: 0.9rem; z-index: 10001; border-bottom: 2px solid #000;">Przejdź do głównej treści</a>

    <div id="a11y-panel" aria-label="Panel ułatwień dostępu" role="region">
        <div class="a11y-icon" tabindex="0" role="button" aria-label="Otwórz/zamknij panel dostępności"><i class="bi bi-eye" aria-hidden="true"></i></div>
        <h6 class="text-center fw-bold" id="a11y-title">Ułatwienia</h6>
        <button class="btn btn-sm btn-outline-dark" onclick="toggleContrast()" aria-label="Włącz wysoki kontrast dla lepszej czytelności" aria-pressed="false" id="contrast-btn">Wysoki Kontrast</button>
        <button class="btn btn-sm btn-outline-dark" onclick="toggleFontSize()" aria-label="Powiększ tekst do 170% rozmiaru" aria-pressed="false" id="font-btn">Powiększ Tekst</button>
        <button class="btn btn-sm btn-danger" onclick="resetA11y()" aria-label="Resetuj wszystkie ustawienia dostępności">Resetuj</button>
    </div>

    <nav class="navbar navbar-expand-lg navbar-dark sticky-top" aria-label="Główna nawigacja" role="navigation">
        <div class="container">
            <a class="navbar-brand" href="/" aria-label="Animatronic Parts - Start">
                <img src="{{ asset('Logo.png') }}" alt="Logo" style="height: 48px; margin-right: 8px;"> ANIMA-PARTS
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Przełącz nawigację">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link active" href="/" aria-current="page">Start</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('products.index') }}">Oferta</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('cart.index') }}"><i class="bi bi-cart3"></i> Koszyk</a></li>

                    @guest
                    <li class="nav-item ms-3">
                        <a href="{{ route('auth.login') }}" class="btn btn-outline-light btn-sm" aria-label="Przejdź do strony logowania">Zaloguj się</a>
                    </li>
                    <li class="nav-item ms-2">
                        <a href="{{ route('auth.register') }}" class="btn btn-outline-light btn-sm" aria-label="Przejdź do rejestracji">Rejestracja</a>
                    </li>
                    @endguest

                    @auth
                    @if(!Auth::user()->isAdmin())
                    <li class="nav-item ms-3">
                        <a class="nav-link" href="{{ route('orders.history') }}" style="color: var(--text-main); margin-right: 15px;">
                            {{ Auth::user()->name }}
                        </a>
                    </li>
                    @endif
                    @if(Auth::user()->isAdmin())
                    <li class="nav-item dropdown ms-2">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: var(--accent-color);">
                            <i class="bi bi-gear"></i> Administrator
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end bg-dark border-secondary">
                            <li>
                                <a class="dropdown-item text-white" href="{{ route('admin.dashboard') }}">
                                    <i class="bi bi-house-gear"></i> Panel Główny
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item text-white" href="{{ route('admin.products') }}">
                                    <i class="bi bi-box"></i> Zarządzaj Produktami
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item text-white" href="{{ route('admin.users.search') }}">
                                    <i class="bi bi-search"></i> Wyszukaj Użytkownika
                                </a>
                            </li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <a class="dropdown-item text-white" href="{{ route('orders.history') }}">
                                    <i class="bi bi-list-check"></i> Moje Zamówienia
                                </a>
                            </li>
                        </ul>
                    </li>
                    @endif
                    <li class="nav-item">
                        <form method="POST" action="{{ route('auth.logout') }}" style="display: inline;">
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm" aria-label="Wyloguj się">Wyloguj</button>
                        </form>
                    </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <main id="main-content" role="main">
        @yield('content')
    </main>

    <footer class="mt-5 py-4">
        <div class="container text-center">
            <p class="text-muted">&copy; 2024 Animatronic Parts. Wszelkie prawa zastrzeżone.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        function toggleContrast() {
            const body = document.body;
            const btn = document.getElementById('contrast-btn');
            body.classList.toggle('high-contrast');
            const isActive = body.classList.contains('high-contrast');
            localStorage.setItem('high-contrast', isActive);
            btn.setAttribute('aria-pressed', isActive);
            announceAccessibilityChange(isActive ? 'Wysoki kontrast włączony' : 'Wysoki kontrast wyłączony');
        }

        function toggleFontSize() {
            const body = document.body;
            const btn = document.getElementById('font-btn');
            body.classList.toggle('large-font');
            const isActive = body.classList.contains('large-font');
            localStorage.setItem('large-font', isActive);
            btn.setAttribute('aria-pressed', isActive);
            announceAccessibilityChange(isActive ? 'Duża czcionka włączona' : 'Duża czcionka wyłączona');
        }

        function resetA11y() {
            document.body.classList.remove('high-contrast', 'large-font');
            localStorage.removeItem('high-contrast');
            localStorage.removeItem('large-font');
            document.getElementById('contrast-btn').setAttribute('aria-pressed', 'false');
            document.getElementById('font-btn').setAttribute('aria-pressed', 'false');
            announceAccessibilityChange('Ustawienia dostępności resetowane');
        }

        function announceAccessibilityChange(message) {
            const announcement = document.createElement('div');
            announcement.setAttribute('role', 'status');
            announcement.setAttribute('aria-live', 'polite');
            announcement.setAttribute('aria-atomic', 'true');
            announcement.style.position = 'absolute';
            announcement.style.left = '-10000px';
            announcement.textContent = message;
            document.body.appendChild(announcement);
            setTimeout(() => announcement.remove(), 1000);
        }

        document.addEventListener('DOMContentLoaded', function() {
            if (localStorage.getItem('high-contrast') === 'true') {
                document.body.classList.add('high-contrast');
                document.getElementById('contrast-btn').setAttribute('aria-pressed', 'true');
            }
            if (localStorage.getItem('large-font') === 'true') {
                document.body.classList.add('large-font');
                document.getElementById('font-btn').setAttribute('aria-pressed', 'true');
            }
            const icon = document.querySelector('.a11y-icon');
            if (icon) {
                icon.addEventListener('click', () => document.getElementById('a11y-panel').classList.toggle('open'));
                icon.addEventListener('keypress', (e) => { if (e.key === 'Enter' || e.key === ' ') document.getElementById('a11y-panel').classList.toggle('open'); });
            }
        });
    </script>
</body>
</html>
