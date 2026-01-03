<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zamówienie Potwierdzone - Animatronic Parts</title>
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
        .success-container {
            max-width: 900px;
            margin: 60px auto;
            padding: 0 15px;
        }
        .success-card {
            background: var(--bg-card);
            border-radius: 20px;
            padding: 50px;
            text-align: center;
            box-shadow: 0 10px 40px rgba(124, 58, 237, 0.3);
        }
        .success-icon {
            font-size: 5rem;
            color: #28a745;
            animation: checkmark 0.8s ease;
        }
        @keyframes checkmark {
            0% { transform: scale(0); }
            50% { transform: scale(1.2); }
            100% { transform: scale(1); }
        }
        .order-number {
            font-family: 'Orbitron', monospace;
            font-size: 2rem;
            color: var(--accent-color);
            margin: 20px 0;
        }
        .order-details {
            background: linear-gradient(135deg, rgba(124, 58, 237, 0.1), rgba(6, 182, 212, 0.1));
            border: 2px solid var(--primary-color);
            border-radius: 15px;
            padding: 30px;
            margin: 30px 0;
            text-align: left;
        }
        .detail-row {
            display: flex;
            justify-content: space-between;
            padding: 12px 0;
            border-bottom: 1px solid rgba(124, 58, 237, 0.3);
        }
        .detail-row:last-child {
            border-bottom: none;
        }
        .btn-home {
            background: linear-gradient(135deg, var(--primary-color), var(--accent-color));
            border: none;
            color: white;
            font-weight: 600;
            padding: 15px 40px;
            border-radius: 10px;
            text-decoration: none;
            display: inline-block;
            margin-top: 20px;
            transition: all 0.3s;
        }
        .btn-home:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 30px rgba(124, 58, 237, 0.5);
            color: white;
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
        body.high-contrast h1, body.high-contrast h2, body.high-contrast h3,
        body.high-contrast p, body.high-contrast span,
        body.high-contrast .btn-home {
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
            <div class="a11y-icon" tabindex="0" role="button" aria-label="Otwórz/zamknij panel dostępności"><i class="bi bi-eye" aria-hidden="true"></i></div>
            <h6 class="text-center fw-bold">Ułatwienia</h6>
            <button class="btn btn-sm btn-outline-dark" onclick="toggleContrast()" aria-pressed="false" id="contrast-btn">Wysoki Kontrast</button>
            <button class="btn btn-sm btn-outline-dark" onclick="toggleFontSize()" aria-pressed="false" id="font-btn">Powiększ Tekst</button>
            <button class="btn btn-sm btn-danger" onclick="resetA11y()">Resetuj</button>
        </div>

    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="/">
                <img src="{{ asset('Logo.png') }}" alt="Logo" style="height: 48px; margin-right: 8px;"> ANIMA-PARTS
            </a>
        </div>
    </nav>

    <div class="success-container" id="main-content">
        @if(session('success'))
        <div class="modal fade" id="orderSuccessModal" tabindex="-1" aria-labelledby="orderSuccessLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content" style="background: var(--bg-card); color: var(--text-main); border: 2px solid var(--accent-color);">
                    <div class="modal-header">
                        <h5 class="modal-title" id="orderSuccessLabel"><i class="bi bi-check-circle-fill" style="color: #28a745;"></i> Transakcja zakończona pomyślnie</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Zamknij"></button>
                    </div>
                    <div class="modal-body">
                        {{ session('success') }}
                    </div>
                    <div class="modal-footer">
                        <a href="{{ route('orders.history') }}" class="btn btn-primary" style="background: linear-gradient(135deg, var(--primary-color), var(--accent-color)); border: none;">Historia zamówień</a>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Zamknij</button>
                    </div>
                </div>
            </div>
        </div>
        @endif

        <div class="success-card">
            <i class="bi bi-check-circle-fill success-icon"></i>
            
            <h1 style="font-family: 'Orbitron', monospace; color: var(--accent-color); margin-top: 20px;">
                Zamówienie Złożone!
            </h1>
            
            <p class="lead mt-3">Dziękujemy za zakupy w Animatronic Parts</p>
            
            <div class="order-number">
                Numer zamówienia: #{{ $order->id }}
            </div>

            <div class="order-details">
                <h4 style="color: var(--accent-color); margin-bottom: 20px;">
                    <i class="bi bi-receipt"></i> Szczegóły zamówienia
                </h4>

                @foreach($order->items as $item)
                <div class="detail-row">
                    <span>{{ $item->product->name }} × {{ $item->quantity }}</span>
                    <strong>{{ number_format($item->price_at_purchase * $item->quantity, 2) }} PLN</strong>
                </div>
                @endforeach

                <div class="detail-row">
                    <span><strong>Produkty razem:</strong></span>
                    <strong>{{ number_format($order->total_price, 2) }} PLN</strong>
                </div>

                <div class="detail-row">
                    <span><strong>Dostawa ({{ $order->shippingMethod->name }}):</strong></span>
                    <strong>{{ number_format($order->shipping_cost, 2) }} PLN</strong>
                </div>

                <div class="detail-row" style="font-size: 1.3rem; color: var(--accent-color); margin-top: 10px;">
                    <span><strong>SUMA:</strong></span>
                    <strong>{{ number_format($order->total_price + $order->shipping_cost, 2) }} PLN</strong>
                </div>
            </div>

            <div style="background: rgba(6, 182, 212, 0.1); border: 1px solid var(--accent-color); border-radius: 10px; padding: 20px; margin: 20px 0;">
                <h5><i class="bi bi-envelope"></i> Potwierdzenie zostało wysłane</h5>
                <p class="mb-0">Szczegóły zamówienia zostały wysłane na adres: <strong>{{ $order->customer_email }}</strong></p>
            </div>

            <div style="background: rgba(124, 58, 237, 0.1); border: 1px solid var(--primary-color); border-radius: 10px; padding: 20px; margin: 20px 0;">
                <h5><i class="bi bi-truck"></i> Status dostawy</h5>
                <p class="mb-0">Szacowany czas dostawy: <strong>{{ $order->shippingMethod->delivery_days }} dni</strong></p>
                <p class="mb-0">Adres: {{ $order->shipping_address }}</p>
            </div>

            <a href="/" class="btn-home">
                <i class="bi bi-house-door"></i> Wróć do strony głównej
            </a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Show success modal once when redirected after checkout
        document.addEventListener('DOMContentLoaded', function() {
            if (document.getElementById('orderSuccessModal')) {
                const modal = new bootstrap.Modal(document.getElementById('orderSuccessModal'));
                modal.show();
            }
        });

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
