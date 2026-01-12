<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Koszyk - Animatronic Parts</title>
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

        body {
            background-color: var(--bg-dark);
            color: var(--text-main);
            font-family: 'Roboto', sans-serif;
            min-height: 100vh;
        }

        h1, h2, h3 {
            font-family: 'Orbitron', sans-serif;
            letter-spacing: 1px;
        }

        .navbar {
            background-color: rgba(18, 18, 18, 0.98);
            border-bottom: 1px solid #444;
        }

        .navbar-brand {
            color: var(--accent-color) !important;
            font-size: 1.5rem;
            font-family: 'Orbitron', sans-serif;
        }

        .cart-container {
            background: linear-gradient(135deg, rgba(157, 78, 221, 0.2), rgba(0, 229, 255, 0.1));
            border: 2px solid rgba(157, 78, 221, 0.5);
            border-radius: 12px;
            padding: 30px;
            margin-top: 30px;
        }

        .cart-item {
            background-color: rgba(30, 30, 36, 0.8);
            border: 1px solid rgba(157, 78, 221, 0.3);
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .cart-item-image {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 8px;
            border: 1px solid rgba(157, 78, 221, 0.3);
        }

        .cart-item-info {
            flex: 1;
        }

        .cart-item-title {
            color: var(--accent-color);
            font-weight: 600;
            font-size: 1.2rem;
            margin-bottom: 5px;
        }

        .cart-item-price {
            color: var(--primary-color);
            font-weight: bold;
            font-size: 1.1rem;
        }

        .quantity-control {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .quantity-control input {
            width: 60px;
            text-align: center;
            background-color: rgba(30, 30, 36, 0.9);
            border: 1px solid rgba(157, 78, 221, 0.3);
            color: var(--text-main);
            border-radius: 4px;
            padding: 5px;
        }

        .btn-custom {
            background: linear-gradient(135deg, var(--primary-color), #c77dff);
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 6px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-custom:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(157, 78, 221, 0.4);
            color: white;
        }

        .btn-danger-custom {
            background: linear-gradient(135deg, #dc3545, #c82333);
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 6px;
            transition: all 0.3s ease;
        }

        .btn-danger-custom:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(220, 53, 69, 0.4);
        }

        .cart-summary {
            background-color: rgba(30, 30, 36, 0.9);
            border: 2px solid rgba(157, 78, 221, 0.5);
            border-radius: 8px;
            padding: 25px;
            margin-top: 20px;
        }

        .total-price {
            color: var(--accent-color);
            font-size: 2rem;
            font-weight: bold;
            font-family: 'Orbitron', sans-serif;
        }

        .empty-cart {
            text-align: center;
            padding: 60px 20px;
        }

        .empty-cart i {
            font-size: 5rem;
            color: var(--text-muted);
            margin-bottom: 20px;
        }

        .alert {
            background-color: rgba(25, 135, 84, 0.2);
            border: 1px solid rgba(25, 135, 84, 0.5);
            color: #75ff75;
        }

        /* Accessibility Panel */
        .skip-link {
            position: absolute;
            top: -40px;
            left: 0;
            background: #ffcc00;
            color: #000;
            padding: 8px;
            text-decoration: none;
            z-index: 100;
        }
        .skip-link:focus {
            top: 0;
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
        #a11y-panel.open {
            transform: translateX(0);
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
        #a11y-panel button:focus-visible {
            outline: 3px solid #0066ff !important;
            outline-offset: 2px;
        }
        .a11y-icon {
            position: absolute;
            left: -35px;
            top: 0;
            background: #fff;
            color: #000;
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
        .a11y-icon:focus-visible {
            outline: 3px solid #0066ff !important;
            outline-offset: 2px;
        }

        body.high-contrast {
            background-color: #000 !important;
            color: #ffff00 !important;
        }
        body.high-contrast .navbar,
        body.high-contrast .cart-card,
        body.high-contrast .cart-item,
        body.high-contrast .cart-summary {
            background-color: #000 !important;
            color: #ffff00 !important;
            border-color: #ffff00 !important;
        }
        body.high-contrast .nav-link,
        body.high-contrast .btn,
        body.high-contrast h1, body.high-contrast h2, body.high-contrast h3,
        body.high-contrast p, body.high-contrast span,
        body.high-contrast .text-muted {
            color: #ffff00 !important;
        }
        body.high-contrast .a11y-icon {
            background-color: #fff !important;
            color: #000 !important;
        }
        body.high-contrast .a11y-icon i {
            color: #000 !important;
        }
        body.high-contrast .skip-link {
            background-color: #ffcc00 !important;
            color: #000 !important;
        }

        body.large-font {
            font-size: 1.7rem !important;
        }
        body.large-font .navbar-brand {
            font-size: 2rem !important;
        }
        body.large-font .btn {
            font-size: 1.5rem !important;
            padding: 15px 25px !important;
        }
    </style>
</head>
<body>
    <a href="#main-content" class="skip-link">Przejdź do głównej treści</a>

    <div id="a11y-panel" aria-label="Panel ułatwień dostępu" role="region">
        <h6 class="text-center fw-bold" id="a11y-title">Ułatwienia</h6>
        <button class="btn btn-sm btn-outline-dark" onclick="toggleContrast()" aria-label="Włącz wysoki kontrast dla lepszej czytelności" aria-pressed="false" id="contrast-btn">Wysoki Kontrast</button>
        <button class="btn btn-sm btn-outline-dark" onclick="toggleFontSize()" aria-label="Powiększ tekst do 170% rozmiaru" aria-pressed="false" id="font-btn">Powiększ Tekst</button>
        <button class="btn btn-sm btn-danger" onclick="resetA11y()" aria-label="Resetuj wszystkie ustawienia dostępności">Resetuj</button>
    </div>

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
                    <li class="nav-item"><a class="nav-link active" href="{{ route('cart.index') }}">Koszyk</a></li>
                    @auth
                        <li class="nav-item ms-3">
                            <a class="nav-link" href="{{ route('orders.history') }}" style="color: var(--text-main);">{{ Auth::user()->name }}</a>
                        </li>
                        <li class="nav-item">
                            <form method="POST" action="{{ route('auth.logout') }}" style="display: inline;">
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm">Wyloguj</button>
                            </form>
                        </li>
                    @else
                        <li class="nav-item ms-3">
                            <a href="{{ route('auth.login') }}" class="btn btn-outline-light btn-sm">Zaloguj się</a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="cart-container">
            <h1 class="mb-4">
                <i class="bi bi-cart3"></i> Twój Koszyk
            </h1>

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if($cart->items->count() > 0)
                <div class="cart-items">
                    @foreach($cart->items as $item)
                        <div class="cart-item">
                            <img src="https://via.placeholder.com/100x100/333/fff?text={{ urlencode(substr($item->product->name, 0, 3)) }}" 
                                 alt="{{ $item->product->name }}" 
                                 class="cart-item-image">
                            
                            <div class="cart-item-info">
                                <div class="cart-item-title">{{ $item->product->name }}</div>
                                <div class="cart-item-price">{{ number_format($item->price, 2) }} PLN</div>
                            </div>

                            <div class="quantity-control">
                                <form method="POST" action="{{ route('cart.update', $item) }}" style="display: inline;">
                                    @csrf
                                    @method('PATCH')
                                    <div class="input-group">
                                        <input type="number" name="quantity" value="{{ $item->quantity }}" min="1" max="99" class="form-control">
                                        <button type="submit" class="btn btn-sm btn-custom">Aktualizuj</button>
                                    </div>
                                </form>
                            </div>

                            <div>
                                <strong style="color: var(--accent-color);">
                                    {{ number_format($item->subtotal, 2) }} PLN
                                </strong>
                            </div>

                            <form method="POST" action="{{ route('cart.remove', $item) }}" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger-custom btn-sm">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </div>
                    @endforeach
                </div>

                <div class="cart-summary">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <h3>Podsumowanie</h3>
                            <p class="text-muted mb-0">Liczba produktów: {{ $cart->itemsCount }}</p>
                        </div>
                        <div class="col-md-6 text-end">
                            <p class="mb-2">Łączna cena:</p>
                            <div class="total-price">{{ number_format($cart->total, 2) }} PLN</div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-6">
                            <form method="POST" action="{{ route('cart.clear') }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger-custom">
                                    <i class="bi bi-trash"></i> Wyczyść koszyk
                                </button>
                            </form>
                        </div>
                        <div class="col-md-6 text-end">
                            <a href="{{ route('checkout.index') }}" class="btn btn-custom btn-lg">
                                <i class="bi bi-credit-card"></i> Przejdź do płatności
                            </a>
                        </div>
                    </div>
                </div>
            @else
                <div class="empty-cart">
                    <i class="bi bi-cart-x"></i>
                    <h2>Twój koszyk jest pusty</h2>
                    <p class="text-muted">Dodaj produkty do koszyka, aby kontynuować zakupy</p>
                    <a href="/" class="btn btn-custom mt-3">
                        <i class="bi bi-arrow-left"></i> Wróć do sklepu
                    </a>
                </div>
            @endif
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
    <script>
        function toggleContrast() {
            const button = document.getElementById('contrast-btn');
            document.body.classList.toggle('high-contrast');
            const isActive = document.body.classList.contains('high-contrast');
            button.setAttribute('aria-pressed', isActive);
            announce('Wysoki kontrast ' + (isActive ? 'włączony' : 'wyłączony'));
            localStorage.setItem('high-contrast', isActive);
        }
        
        function toggleFontSize() {
            const button = document.getElementById('font-btn');
            document.body.classList.toggle('large-font');
            const isActive = document.body.classList.contains('large-font');
            button.setAttribute('aria-pressed', isActive);
            announce('Powiększanie tekstu ' + (isActive ? 'włączone' : 'wyłączone'));
            localStorage.setItem('large-font', isActive);
        }
        
        function resetA11y() {
            document.body.classList.remove('high-contrast');
            document.body.classList.remove('large-font');
            document.getElementById('contrast-btn').setAttribute('aria-pressed', 'false');
            document.getElementById('font-btn').setAttribute('aria-pressed', 'false');
            announce('Ustawienia dostępności zostały zresetowane');
            localStorage.removeItem('high-contrast');
            localStorage.removeItem('large-font');
        }
        
        function announce(message) {
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
