<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Finalizacja Zamówienia - Animatronic Parts</title>
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
        .checkout-container {
            max-width: 1200px;
            margin: 40px auto;
            padding: 0 15px;
        }
        .checkout-card {
            background: var(--bg-card);
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 8px 32px rgba(124, 58, 237, 0.2);
            margin-bottom: 30px;
        }
        .section-title {
            font-family: 'Orbitron', monospace;
            color: var(--accent-color);
            font-size: 1.5rem;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid var(--primary-color);
        }
        .form-label {
            color: var(--text-main);
            font-weight: 500;
            margin-bottom: 8px;
        }
        .form-control, .form-select {
            background: #16213e;
            border: 1px solid var(--primary-color);
            color: var(--text-main);
            padding: 12px;
            border-radius: 8px;
        }
        .form-control:focus, .form-select:focus {
            background: #16213e;
            border-color: var(--accent-color);
            color: var(--text-main);
            box-shadow: 0 0 0 0.2rem rgba(6, 182, 212, 0.25);
        }
        .order-summary {
            background: linear-gradient(135deg, rgba(124, 58, 237, 0.1), rgba(6, 182, 212, 0.1));
            border: 2px solid var(--primary-color);
            border-radius: 15px;
            padding: 25px;
        }
        .order-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 0;
            border-bottom: 1px solid rgba(124, 58, 237, 0.3);
        }
        .order-item:last-child {
            border-bottom: none;
        }
        .order-item .text-muted {
            color: #ffffff !important;
        }

        .alert-info {
            background: rgba(6, 182, 212, 0.1);
            border: 1px solid var(--accent-color);
            color: var(--text-main);
        }

        .shipping-option, .payment-option {
            display: block;
            background: linear-gradient(135deg, rgba(124, 58, 237, 0.15), rgba(6, 182, 212, 0.15));
            border: 2px solid var(--primary-color);
            border-radius: 12px;
            padding: 18px 20px;
            margin-bottom: 15px;
            cursor: pointer;
            transition: all 0.3s;
            position: relative;
            color: #fff;
        }
        .shipping-option:hover, .payment-option:hover {
            border-color: var(--accent-color);
            background: linear-gradient(135deg, rgba(124, 58, 237, 0.25), rgba(6, 182, 212, 0.25));
            transform: translateX(5px);
        }
        .shipping-option input[type="radio"], .payment-option input[type="radio"] {
            margin-right: 12px;
            width: 20px;
            height: 20px;
            cursor: pointer;
        }
        .shipping-option strong, .payment-option strong {
            color: var(--accent-color);
            font-size: 1.1rem;
        }
        .shipping-option .text-muted, .payment-option .text-muted {
            display: block;
            margin-top: 5px;
            padding-left: 32px;
            line-height: 1.5;
            color: #e0e0e0 !important;
        }
        .btn-checkout {
            background: linear-gradient(135deg, var(--primary-color), var(--accent-color));
            border: none;
            color: white;
            font-weight: 600;
            padding: 15px 40px;
            border-radius: 10px;
            font-size: 1.1rem;
            width: 100%;
            transition: all 0.3s;
        }
        .btn-checkout:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 30px rgba(124, 58, 237, 0.5);
        }
        .total-price {
            background: linear-gradient(135deg, rgba(124, 58, 237, 0.2), rgba(6, 182, 212, 0.2));
            border: 2px solid var(--accent-color);
            border-radius: 12px;
            padding: 20px;
            margin-top: 20px;
            text-align: center;
            font-family: 'Orbitron', monospace;
        }
        .total-price span {
            font-size: 2rem;
            font-weight: 700;
            color: var(--accent-color);
        }
        .login-warning {
            background: linear-gradient(135deg, rgba(220, 53, 69, 0.1), rgba(255, 193, 7, 0.1));
            border: 2px solid #dc3545;
            border-radius: 15px;
            padding: 30px;
            text-align: center;
        }
        .login-warning h3 {
            color: #dc3545;
            font-family: 'Orbitron', monospace;
            margin-bottom: 20px;
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
            color: #ffff00 !important;
        }
        body.high-contrast .nav-link,
        body.high-contrast .btn,
        body.high-contrast .form-label,
        body.high-contrast .form-control,
        body.high-contrast .form-select,
        body.high-contrast h1, body.high-contrast h2, body.high-contrast h3,
        body.high-contrast p, body.high-contrast span,
        body.high-contrast .text-muted,
        body.high-contrast label {
            color: #ffff00 !important;
        }
        body.high-contrast .form-control,
        body.high-contrast .form-select {
            border-color: #ffff00 !important;
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
        body.high-contrast #a11y-panel,
        body.high-contrast #a11y-panel button,
        body.high-contrast #a11y-panel h6 {
            background: #fff !important;
            color: #000 !important;
            border-color: #000 !important;
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
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('cart.index') }}">
                        <i class="bi bi-cart3"></i> Wróć do koszyka
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="checkout-container" id="main-content">
        <h1 class="text-center mb-4" style="font-family: 'Orbitron', monospace; color: var(--accent-color);">
            <i class="bi bi-credit-card"></i> Finalizacja Zamówienia
        </h1>

        @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        @if(!Auth::check())
        <div class="login-warning">
            <i class="bi bi-exclamation-triangle-fill" style="font-size: 2rem; color: #dc3545;"></i>
            <h3 class="mt-3">Wymagane logowanie</h3>
            <p>Aby wybrać opcje płatności i złożyć zamówienie, musisz być zalogowany.</p>
            <a href="{{ route('auth.login') }}" class="btn btn-danger btn-lg">Zaloguj się</a>
        </div>
        @else
        <div class="row">
            <div class="col-lg-7">
                <div class="checkout-card">
                    <form method="POST" action="{{ route('checkout.process') }}" id="checkoutForm">
                        @csrf
                        
                        <h3 class="section-title"><i class="bi bi-person-circle"></i> Dane odbiorcy</h3>
                        
                        <div class="mb-3">
                            <label for="customer_name" class="form-label">Imię i nazwisko</label>
                            <input type="text" class="form-control" id="customer_name" name="customer_name" 
                                   value="{{ Auth::user()->name }}" required>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="customer_email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="customer_email" name="customer_email" 
                                       value="{{ Auth::user()->email }}" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="customer_phone" class="form-label">Telefon</label>
                                <input type="tel" class="form-control" id="customer_phone" name="customer_phone" 
                                       placeholder="+48 123 456 789" required>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="shipping_address" class="form-label">Adres dostawy</label>
                            <textarea class="form-control" id="shipping_address" name="shipping_address" 
                                      rows="3" placeholder="Ulica, numer domu, kod pocztowy, miasto" required></textarea>
                        </div>

                        <h3 class="section-title"><i class="bi bi-truck"></i> Sposób dostawy</h3>
                        
                        <div id="shippingMethods">
                            @foreach($shippingMethods as $method)
                            <label class="shipping-option">
                                <input type="radio" name="shipping_method_id" value="{{ $method->id }}" 
                                       data-cost="{{ $method->cost }}" required 
                                       @if($loop->first) checked @endif>
                                <strong>{{ $method->name }}</strong> - {{ number_format($method->cost, 2) }} PLN
                                <br>
                                <small class="text-muted">Dostawa w ciągu {{ $method->delivery_days }} dni</small>
                                @if($method->description)
                                <br><small class="text-muted">{{ $method->description }}</small>
                                @endif
                            </label>
                            @endforeach
                        </div>

                        <h3 class="section-title mt-4"><i class="bi bi-credit-card-2-front"></i> Metoda płatności</h3>
                        
                        <label class="payment-option">
                            <input type="radio" name="payment_method" value="card" checked>
                            <i class="bi bi-credit-card"></i> <strong>Karta płatnicza</strong>
                            <br><small class="text-muted">Visa, Mastercard, BLIK</small>
                        </label>

                        <label class="payment-option">
                            <input type="radio" name="payment_method" value="transfer">
                            <i class="bi bi-bank"></i> <strong>Przelew bankowy</strong>
                            <br><small class="text-muted">Tradycyjny przelew</small>
                        </label>

                        <label class="payment-option">
                            <input type="radio" name="payment_method" value="cash_on_delivery">
                            <i class="bi bi-cash-coin"></i> <strong>Płatność przy odbiorze</strong>
                            <br><small class="text-muted">Zapłać kurierowi</small>
                        </label>

                        <button type="submit" class="btn-checkout mt-4">
                            <i class="bi bi-check-circle"></i> Złóż zamówienie
                        </button>
                    </form>
                </div>
            </div>

            <div class="col-lg-5">
                <div class="order-summary">
                    <h3 class="section-title"><i class="bi bi-receipt"></i> Podsumowanie</h3>
                    
                    @foreach($cart->items as $item)
                    <div class="order-item">
                        <div>
                            <strong>{{ $item->product->name }}</strong>
                            <br>
                            <small class="text-muted">{{ $item->quantity }} × {{ number_format($item->price, 2) }} PLN</small>
                        </div>
                        <div>
                            <strong>{{ number_format($item->subtotal, 2) }} PLN</strong>
                        </div>
                    </div>
                    @endforeach

                    <div class="order-item">
                        <strong>Produkty razem:</strong>
                        <strong id="subtotal">{{ number_format($cart->total, 2) }} PLN</strong>
                    </div>

                    <div class="order-item">
                        <strong>Dostawa:</strong>
                        <strong id="shippingCost">{{ number_format($shippingMethods->first()->cost, 2) }} PLN</strong>
                    </div>

                    <div class="total-price">
                        <div style="font-size: 1rem; color: var(--text-main); font-family: 'Roboto', sans-serif;">SUMA:</div>
                        <span id="totalPrice">{{ number_format($cart->total + $shippingMethods->first()->cost, 2) }}</span> PLN
                    </div>

                    <div class="alert alert-info mt-3">
                        <i class="bi bi-info-circle"></i> Twoje dane są bezpieczne i zaszyfrowane
                    </div>
                </div>
            </div>
        </div>
        @endif
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
        // Update total when shipping method changes
        const shippingRadios = document.querySelectorAll('input[name="shipping_method_id"]');
        const subtotal = {{ $cart->total }};
        
        shippingRadios.forEach(radio => {
            radio.addEventListener('change', function() {
                const shippingCost = parseFloat(this.dataset.cost);
                const total = subtotal + shippingCost;
                
                document.getElementById('shippingCost').textContent = shippingCost.toFixed(2) + ' PLN';
                document.getElementById('totalPrice').textContent = total.toFixed(2);
            });
        });

        // Accessibility functions
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
