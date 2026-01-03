<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Twoje zamówienia - Animatronic Parts</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
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
        .page-header {
            text-align: center;
            margin: 40px 0 20px;
        }
        .orders-card {
            background: var(--bg-card);
            border-radius: 15px;
            padding: 25px;
            box-shadow: 0 8px 32px rgba(124, 58, 237, 0.2);
        }
        .order-row {
            border-bottom: 1px solid rgba(124, 58, 237, 0.3);
            padding: 15px 0;
        }
        .order-row:last-child {
            border-bottom: none;
        }
        .badge-status {
            background: linear-gradient(135deg, rgba(124,58,237,0.2), rgba(6,182,212,0.2));
            border: 1px solid var(--primary-color);
            color: var(--text-main);
        }
        .order-total {
            color: var(--accent-color);
            font-weight: 700;
        }
        .item-line {
            font-size: 0.95rem;
            color: #cfd2ff;
        }
        .empty-state {
            text-align: center;
            padding: 60px 20px;
            background: var(--bg-card);
            border-radius: 15px;
            border: 1px dashed rgba(124, 58, 237, 0.5);
        }
        /* Accessibility */
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
        .skip-link:focus { top: 0; }
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
        #a11y-panel.open { transform: translateX(0); }
        #a11y-panel:hover, #a11y-panel:focus-within { transform: translateX(0); }
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
        /* High contrast without changing the base background */
        body.high-contrast { color: #ffff00 !important; }
        body.high-contrast .orders-card,
        body.high-contrast .navbar { border-color: #ffff00 !important; }
        body.high-contrast .order-row,
        body.high-contrast .item-line,
        body.high-contrast .order-total,
        body.high-contrast .nav-link,
        body.high-contrast .navbar-brand,
        body.high-contrast .btn { color: #ffff00 !important; }
        body.high-contrast .badge-status { border-color: #ffff00 !important; }
        body.large-font { font-size: 1.7rem !important; }
        body.large-font .navbar-brand { font-size: 2rem !important; }
        body.large-font .btn { font-size: 1.5rem !important; padding: 15px 25px !important; }
    </style>
</head>
<body>
    <a href="#main-content" class="skip-link">Przejdź do głównej treści</a>

    <div id="a11y-panel" aria-label="Panel ułatwień dostępu" role="region">
        <div class="a11y-icon" tabindex="0" role="button" aria-label="Otwórz/zamknij panel dostępności"><i class="bi bi-eye" aria-hidden="true"></i></div>
        <h6 class="text-center fw-bold">Ułatwienia</h6>
        <button class="btn btn-sm btn-outline-dark" onclick="toggleContrast()" aria-pressed="false" id="contrast-btn">Wysoki Kontrast</button>
        <button class="btn btn-sm btn-outline-dark" onclick="toggleFontSize()" aria-pressed="false" id="font-btn">Powiększ Tekst</button>
        <button class="btn btn-sm btn-danger" onclick="resetA11y()">Resetuj</button>
    </div>

    <nav class="navbar navbar-expand-lg navbar-dark sticky-top">
        <div class="container">
            <a class="navbar-brand" href="/">
                <img src="{{ asset('Logo.png') }}" alt="Logo" style="height: 48px; margin-right: 8px;"> ANIMA-PARTS
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="/">Start</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('products.index') }}">Oferta</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('cart.index') }}"><i class="bi bi-cart3"></i> Koszyk</a></li>
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="{{ route('orders.history') }}"><i class="bi bi-person-circle"></i> {{ Auth::user()->name }}</a></li>
                    <li class="nav-item">
                        <form method="POST" action="{{ route('auth.logout') }}" style="display: inline;">
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm">Wyloguj</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container" id="main-content">
        <div class="page-header">
            <h1 class="display-5" style="color: var(--accent-color); font-family: 'Orbitron', monospace;">Historia zamówień</h1>
            <p class="lead">Sprawdź swoje ostatnie zakupy i szczegóły dostawy.</p>
        </div>

        @if($orders->isEmpty())
            <div class="empty-state">
                <i class="bi bi-inbox" style="font-size: 3rem; color: var(--accent-color);"></i>
                <h3 class="mt-3">Brak zamówień</h3>
                <p class="mb-4">Gdy złożysz zamówienie, pojawi się tutaj w historii.</p>
                <a href="{{ route('products.index') }}" class="btn btn-primary" style="background: linear-gradient(135deg, var(--primary-color), var(--accent-color)); border: none;">Przeglądaj produkty</a>
            </div>
        @else
            <div class="orders-card">
                @foreach($orders as $order)
                    @php
                        $itemsTotal = $order->items->sum(fn($i) => $i->price_at_purchase * $i->quantity);
                        $grandTotal = $itemsTotal + $order->shipping_cost - $order->discount_amount;
                    @endphp
                    <div class="order-row">
                        <div class="d-flex justify-content-between align-items-center flex-wrap">
                            <div>
                                <strong>#{{ $order->id }}</strong> • {{ $order->created_at->format('Y-m-d H:i') }}
                                <div class="item-line">{{ $order->shipping_address }}</div>
                            </div>
                            <div class="text-end">
                                <span class="badge badge-status">{{ $order->status?->name ?? 'Brak statusu' }}</span>
                                <div class="order-total mt-1">{{ number_format($grandTotal, 2) }} PLN</div>
                                <small>{{ $order->shippingMethod?->name ?? 'Dostawa' }} • Dostawa: {{ $order->shippingMethod?->delivery_days }} dni</small>
                            </div>
                        </div>
                        <div class="mt-2">
                            @foreach($order->items as $item)
                                <div class="item-line">{{ $item->product->name }} × {{ $item->quantity }} — {{ number_format($item->price_at_purchase * $item->quantity, 2) }} PLN</div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function toggleContrast() {
            const button = document.getElementById('contrast-btn');
            document.body.classList.toggle('high-contrast');
            const isActive = document.body.classList.contains('high-contrast');
            button.setAttribute('aria-pressed', isActive);
            localStorage.setItem('high-contrast', isActive);
        }

        function toggleFontSize() {
            const button = document.getElementById('font-btn');
            document.body.classList.toggle('large-font');
            const isActive = document.body.classList.contains('large-font');
            button.setAttribute('aria-pressed', isActive);
            localStorage.setItem('large-font', isActive);
        }

        function resetA11y() {
            document.body.classList.remove('high-contrast');
            document.body.classList.remove('large-font');
            document.getElementById('contrast-btn').setAttribute('aria-pressed', 'false');
            document.getElementById('font-btn').setAttribute('aria-pressed', 'false');
            localStorage.removeItem('high-contrast');
            localStorage.removeItem('large-font');
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
