<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Oferta - Animatronic Parts</title>
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
        .nav-link:hover {
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
        .filters-card {
            background: var(--bg-card);
            border: 2px solid var(--primary-color);
            border-radius: 15px;
            padding: 25px;
            margin-bottom: 30px;
        }
        .filter-title {
            font-family: 'Orbitron', monospace;
            color: var(--accent-color);
            font-size: 1.2rem;
            margin-bottom: 15px;
            padding-bottom: 10px;
            border-bottom: 2px solid var(--primary-color);
        }
        .form-control, .form-select {
            background: #16213e;
            border: 1px solid var(--primary-color);
            color: var(--text-main);
            padding: 10px;
            border-radius: 8px;
        }
        .form-control:focus, .form-select:focus {
            background: #16213e;
            border-color: var(--accent-color);
            color: var(--text-main);
            box-shadow: 0 0 0 0.2rem rgba(6, 182, 212, 0.25);
        }
        .form-control::placeholder {
            color: #8b8b8b;
        }
        .form-label {
            color: var(--text-main);
            font-weight: 500;
            margin-bottom: 8px;
        }
        .btn-primary {
            background: linear-gradient(135deg, var(--primary-color), var(--accent-color));
            border: none;
            color: white;
            font-weight: 600;
            padding: 10px 25px;
            border-radius: 8px;
            transition: all 0.3s;
        }
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 20px rgba(124, 58, 237, 0.5);
        }
        .btn-secondary {
            background: #6c757d;
            border: none;
            color: white;
            padding: 10px 25px;
            border-radius: 8px;
        }
        .product-card {
            background: var(--bg-card);
            border: 2px solid var(--primary-color);
            border-radius: 15px;
            padding: 20px;
            margin-bottom: 25px;
            transition: all 0.3s;
            height: 100%;
            display: flex;
            flex-direction: column;
        }
        .product-card:hover {
            border-color: var(--accent-color);
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(124, 58, 237, 0.3);
        }
        .product-name {
            color: var(--accent-color);
            font-weight: 700;
            font-size: 1.1rem;
            margin-bottom: 10px;
        }
        .product-price {
            font-family: 'Orbitron', monospace;
            color: var(--accent-color);
            font-size: 1.5rem;
            font-weight: 700;
            margin: 15px 0;
        }
        .product-description {
            color: var(--text-main);
            font-size: 0.9rem;
            margin-bottom: 15px;
            flex-grow: 1;
        }
        .product-meta {
            color: #8b8b8b;
            font-size: 0.85rem;
            margin-bottom: 10px;
        }
        .stock-badge {
            display: inline-block;
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
            margin-bottom: 10px;
        }
        .stock-available {
            background: rgba(40, 167, 69, 0.2);
            color: #28a745;
            border: 1px solid #28a745;
        }
        .stock-low {
            background: rgba(255, 193, 7, 0.2);
            color: #ffc107;
            border: 1px solid #ffc107;
        }
        .stock-out {
            background: rgba(220, 53, 69, 0.2);
            color: #dc3545;
            border: 1px solid #dc3545;
        }
        .btn-add-cart {
            background: linear-gradient(135deg, var(--primary-color), var(--accent-color));
            border: none;
            color: white;
            font-weight: 600;
            padding: 10px 20px;
            border-radius: 8px;
            transition: all 0.3s;
            width: 100%;
        }
        .btn-add-cart:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(124, 58, 237, 0.5);
            color: white;
        }
        .btn-add-cart:disabled {
            background: #6c757d;
            cursor: not-allowed;
            transform: none;
        }
        .pagination {
            margin-top: 20px;
            gap: 4px;
        }
        .pagination .page-link {
            background: var(--bg-card);
            border: 1px solid var(--primary-color);
            color: var(--accent-color);
            border-radius: 6px;
            padding: 4px 8px;
            font-size: 1.2rem;
            min-width: 36px;
            text-align: center;
            line-height: 1.2;
        }
        .pagination .page-link svg {
            width: 20px;
            height: 20px;
            vertical-align: middle;
        }
        /* Hide oversized prev/next arrows and rely on numeric links */
        .pagination .page-item:first-child .page-link,
        .pagination .page-item:last-child .page-link {
            display: none;
        }
        .pagination .page-link:hover {
            background: var(--primary-color);
            color: white;
        }
        .pagination .page-item.active .page-link {
            background: var(--accent-color);
            border-color: var(--accent-color);
            color: white;
        }
        .pagination .page-item.disabled .page-link {
            opacity: 0.5;
            cursor: not-allowed;
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
        body.high-contrast label,
        body.high-contrast .product-meta,
        body.high-contrast .product-description,
        body.high-contrast .product-name,
        body.high-contrast .lead,
        body.high-contrast .dropdown-item {
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
        body.high-contrast .pagination .page-link {
            color: #ffff00 !important;
            border-color: #ffff00 !important;
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
        body.large-font .btn,
        body.large-font .btn-add-cart,
        body.large-font .btn-primary,
        body.large-font .btn-secondary {
            font-size: 1.5rem !important;
            padding: 15px 25px !important;
        }
        body.large-font .pagination .page-link {
            font-size: 1.5rem !important;
            padding: 6px 10px !important;
            min-width: 44px !important;
        }
        body.large-font .product-name,
        body.large-font .product-price,
        body.large-font .product-description,
        body.large-font .product-meta,
        body.large-font .stock-badge,
        body.large-font .filter-title,
        body.large-font .page-title,
        body.large-font .form-label,
        body.large-font .form-control,
        body.large-font .form-select,
        body.large-font .nav-link,
        body.large-font label,
        body.large-font h1,
        body.large-font h2,
        body.large-font h3,
        body.large-font h4,
        body.large-font h5,
        body.large-font p,
        body.large-font span,
        body.large-font .lead,
        body.large-font .dropdown-item {
            font-size: 1.7rem !important;
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
                    <li class="nav-item"><a class="nav-link active" href="{{ route('products.index') }}">Oferta</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('cart.index') }}"><i class="bi bi-cart3"></i> Koszyk</a></li>
                    @guest
                    <li class="nav-item ms-3">
                        <a class="btn btn-outline-light btn-sm" href="{{ route('auth.login') }}">Zaloguj się</a>
                    </li>
                    @else
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown">
                            <i class="bi bi-person-circle"></i> {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" style="background: var(--bg-card); border: 1px solid var(--primary-color);">
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
            <h1 class="page-title display-4">Pełna Oferta Produktów</h1>
            <p class="lead" style="color: var(--text-main);">Przeglądaj i filtruj naszą kolekcję części animatronicznych</p>
        </div>
    </div>

    <div class="container mb-5">
        <div class="row">
            <!-- Filters Sidebar -->
            <div class="col-lg-3">
                <div class="filters-card">
                    <h3 class="filter-title"><i class="bi bi-funnel"></i> Filtry</h3>
                    
                    <form method="GET" action="{{ route('products.index') }}">
                        <!-- Search -->
                        <div class="mb-3">
                            <label for="search" class="form-label">Szukaj</label>
                            <input type="text" class="form-control" id="search" name="search" 
                                   placeholder="Nazwa produktu..." value="{{ request('search') }}">
                        </div>

                        <!-- Category -->
                        <div class="mb-3">
                            <label for="category" class="form-label">Kategoria</label>
                            <select class="form-select" id="category" name="category">
                                <option value="">Wszystkie</option>
                                @foreach($categories as $category)
                                <option value="{{ $category->id }}" 
                                    {{ request('category') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Manufacturer -->
                        <div class="mb-3">
                            <label for="manufacturer" class="form-label">Producent</label>
                            <select class="form-select" id="manufacturer" name="manufacturer">
                                <option value="">Wszyscy</option>
                                @foreach($manufacturers as $manufacturer)
                                <option value="{{ $manufacturer->id }}" 
                                    {{ request('manufacturer') == $manufacturer->id ? 'selected' : '' }}>
                                    {{ $manufacturer->name }}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Sort -->
                        <div class="mb-3">
                            <label for="sort" class="form-label">Sortuj według</label>
                            <select class="form-select" id="sort" name="sort">
                                <option value="name" {{ request('sort') == 'name' ? 'selected' : '' }}>Nazwy</option>
                                <option value="price" {{ request('sort') == 'price' ? 'selected' : '' }}>Ceny</option>
                                <option value="stock" {{ request('sort') == 'stock' ? 'selected' : '' }}>Dostępności</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="order" class="form-label">Kolejność</label>
                            <select class="form-select" id="order" name="order">
                                <option value="asc" {{ request('order') == 'asc' ? 'selected' : '' }}>Rosnąco</option>
                                <option value="desc" {{ request('order') == 'desc' ? 'selected' : '' }}>Malejąco</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary w-100 mb-2">
                            <i class="bi bi-search"></i> Filtruj
                        </button>
                        <a href="{{ route('products.index') }}" class="btn btn-secondary w-100">
                            <i class="bi bi-x-circle"></i> Wyczyść
                        </a>
                    </form>
                </div>
            </div>

            <!-- Products Grid -->
            <div class="col-lg-9">
                <div class="mb-3" style="color: var(--text-main);">
                    Znaleziono <strong>{{ $products->total() }}</strong> produktów
                </div>

                @if($products->isEmpty())
                <div class="alert" style="background: rgba(220, 53, 69, 0.1); border: 1px solid #dc3545; color: var(--text-main);">
                    <i class="bi bi-exclamation-triangle"></i> Nie znaleziono produktów spełniających kryteria
                </div>
                @else
                <div class="row">
                    @foreach($products as $product)
                    <div class="col-md-6 col-xl-4">
                        <div class="product-card">
                            <h5 class="product-name">{{ $product->name }}</h5>
                            
                            <div class="product-meta">
                                <i class="bi bi-tag"></i> {{ $product->category->name ?? 'Bez kategorii' }}
                                <br>
                                <i class="bi bi-building"></i> {{ $product->manufacturer->name ?? 'Brak' }}
                            </div>

                            @if($product->stock_quantity > 10)
                            <span class="stock-badge stock-available">
                                <i class="bi bi-check-circle"></i> Dostępny
                            </span>
                            @elseif($product->stock_quantity > 0)
                            <span class="stock-badge stock-low">
                                <i class="bi bi-exclamation-triangle"></i> Mało sztuk ({{ $product->stock_quantity }})
                            </span>
                            @else
                            <span class="stock-badge stock-out">
                                <i class="bi bi-x-circle"></i> Brak w magazynie
                            </span>
                            @endif

                            <p class="product-description">
                                {{ Str::limit($product->description, 100) }}
                            </p>

                            <div class="product-price">
                                {{ number_format($product->price, 2) }} PLN
                            </div>

                            <form method="POST" action="{{ route('cart.add', $product) }}">
                                @csrf
                                <button type="submit" class="btn-add-cart" 
                                    {{ $product->stock_quantity == 0 ? 'disabled' : '' }}>
                                    <i class="bi bi-cart-plus"></i> 
                                    {{ $product->stock_quantity > 0 ? 'Dodaj do koszyka' : 'Niedostępny' }}
                                </button>
                            </form>
                        </div>
                    </div>
                    @endforeach
                </div>

                <!-- Pagination (custom compact) -->
                @if ($products->hasPages())
                <nav class="d-flex justify-content-center" aria-label="Paginacja produktów">
                    <ul class="pagination" style="margin-bottom: 0;">
                        @foreach ($products->getUrlRange(1, $products->lastPage()) as $page => $url)
                            <li class="page-item {{ $page === $products->currentPage() ? 'active' : '' }}">
                                <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                            </li>
                        @endforeach
                    </ul>
                </nav>
                @endif
                @endif
            </div>
        </div>
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
