<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ustaw hasło - {{ $user->name }} - MeScrap</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700;900&family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #7c3aed;
            --accent-color: #06b6d4;
            --bg-dark: #0f0f23;
            --bg-card: #1a1a2e;
            --text-main: #e0e0e0;
        }
        body {
            font-family: 'Roboto', sans-serif;
            background-color: var(--bg-dark);
            color: var(--text-main);
            min-height: 100vh;
        }
        .navbar {
            background: linear-gradient(135deg, #1a1a2e 0%, #16213e 100%);
            border-bottom: 2px solid var(--primary-color);
        }
        .navbar-brand {
            font-family: 'Orbitron', monospace;
            font-weight: 700;
            color: var(--accent-color) !important;
            font-size: 1.5rem;
        }
        .nav-link {
            color: var(--text-main) !important;
            transition: color 0.3s;
        }
        .nav-link:hover, .nav-link.active {
            color: var(--accent-color) !important;
        }
        .page-header {
            background: linear-gradient(135deg, rgba(124, 58, 237, 0.2), rgba(6, 182, 212, 0.2));
            border-bottom: 2px solid var(--primary-color);
            padding: 40px 0;
            margin-bottom: 40px;
        }
        .page-title {
            font-family: 'Orbitron', monospace;
            background: linear-gradient(135deg, var(--accent-color), var(--primary-color));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            font-weight: 700;
        }
        .card {
            background: var(--bg-card);
            border: 2px solid var(--primary-color);
            border-radius: 15px;
        }
        .form-label,
        .form-text,
        .alert,
        .card-body {
            color: var(--text-main);
        }
        .form-control {
            background-color: #101025;
            border: 1px solid #3a3a5a;
            color: #f0f0f0;
        }
        .form-control:focus {
            background-color: #151531;
            color: #ffffff;
            border-color: var(--accent-color);
            box-shadow: 0 0 0 0.2rem rgba(6, 182, 212, 0.25);
        }
        .btn-primary {
            background: linear-gradient(135deg, var(--primary-color), var(--accent-color));
            border: none;
        }
        .skip-link {
            position: absolute;
            top: -40px;
            left: 0;
            background: #000;
            color: #fff;
            padding: 8px;
            z-index: 100;
        }
        .skip-link:focus {
            top: 0;
        }
    </style>
</head>
<body>
    <a href="#main-content" class="skip-link">Przejdź do głównej treści</a>

    <nav class="navbar navbar-expand-lg navbar-dark sticky-top">
        <div class="container">
            <a class="navbar-brand" href="/">
                <img src="{{ asset('Logo.png') }}" alt="Logo" style="height: 48px; margin-right: 8px;"> MeScrap
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="/">Start</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('products.index') }}">Oferta</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('cart.index') }}"><i class="bi bi-cart3"></i> Koszyk</a></li>
                    @guest
                    <li class="nav-item ms-3">
                        <a class="btn btn-outline-light btn-sm" href="{{ route('auth.login') }}">Zaloguj się</a>
                    </li>
                    @else
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown">
                            <i class="bi bi-person-circle"></i> {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" style="background: var(--bg-card); border: 1px solid var(--primary-color);">
                            @if(Auth::user()->isAdmin())
                                <li><a class="dropdown-item" style="color: var(--text-main);" href="{{ route('admin.dashboard') }}">Panel Admina</a></li>
                                <li><a class="dropdown-item" style="color: var(--text-main);" href="{{ route('admin.users.index') }}">Użytkownicy</a></li>
                            @endif
                            <li><a class="dropdown-item" style="color: var(--text-main);" href="{{ route('orders.history') }}">Historia zamówień</a></li>
                            <li>
                                <form method="POST" action="{{ route('auth.logout') }}">
                                    @csrf
                                    <button class="dropdown-item" style="color: var(--text-main);">Wyloguj</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <div class="page-header">
        <div class="container">
            <h1 class="page-title display-4">Ustaw hasło użytkownika</h1>
            <p class="lead" style="color: var(--text-main);">{{ $user->name }} ({{ $user->email }})</p>
        </div>
    </div>

    <div class="container mb-5" id="main-content">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0"><i class="bi bi-key"></i> Ustaw nowe hasło</h5>
            </div>
            <div class="card-body">
                <p class="text-warning mb-4">
                    Nie ma możliwości wyświetlenia obecnego hasła (w bazie jest tylko hash). Możesz natomiast ustawić nowe hasło.
                </p>

                <form method="POST" action="{{ route('admin.users.password.update', $user) }}">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="password" class="form-label">Nowe hasło</label>
                        <input type="password" class="form-control" id="password" name="password" autocomplete="new-password" required>
                        <div class="form-text">Minimum 8 znaków.</div>
                    </div>

                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Powtórz nowe hasło</label>
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" autocomplete="new-password" required>
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-save"></i> Zapisz hasło
                        </button>
                        <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">
                            <i class="bi bi-arrow-left"></i> Wróć
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <footer class="text-center text-lg-start mt-5 pt-4 border-top border-secondary" role="contentinfo" aria-label="Informacje o stronie" style="color: #d0d0d0;">
        <div class="container p-4">
            <p style="color: #d0d0d0;">© 2026 MeScrap. Sklep spełniający wymagania dostępności <abbr title="Web Content Accessibility Guidelines">WCAG</abbr> 2.1 poziom AA.</p>

            <div class="small mt-3" style="color: #d0d0d0;">
                <p class="mb-1"><strong>Kontakt:</strong></p>
                <p class="mb-1">Email: <a href="mailto:kontakt@mescrap.pl" style="color: #00d4ff;">kontakt@mescrap.pl</a></p>
                <p class="mb-1">Telefon: <a href="tel:+48123456789" style="color: #00d4ff;">+48 123 456 789</a></p>
                <p class="mb-1">Adres: ul. Robotyczna 42, 00-001 Warszawa, Polska</p>
            </div>

            <p class="small" style="color: #d0d0d0;">
                <a href="#" aria-label="Oświadczenie dostępności" style="color: #00d4ff;">Oświadczenie dostępności</a> |
                <a href="#" aria-label="Polityka prywatności" style="color: #00d4ff;">Polityka prywatności</a> |
                <a href="#" aria-label="Warunki użytkowania" style="color: #00d4ff;">Warunki użytkowania</a>
            </p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
