<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Animatronic Parts - Sklep (WCAG)</title>
    
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
        --text-muted: #adb5bd; /* Jaśniejszy szary domyślnie */
    }

    /* --- 1. Dostępność: Focus --- */
    *:focus-visible {
        outline: 3px solid #ffcc00 !important;
        outline-offset: 2px;
    }

    /* --- 2. Dostępność: Skip Link --- */
    .skip-link {
        display: block;            /* Blokowy, zajmuje całą szerokość */
        position: relative;        /* Normalnie w dokumencie, nie lata nad nim */
        background: #ffcc00;       /* Żółty ostrzegawczy (klimat industrialny) */
        color: #000;               /* Czarny tekst */
        text-align: center;        /* Wyśrodkowanie */
        padding: 5px 0;            /* Marginesy wewnątrz */
        font-weight: bold;
        text-decoration: none;
        font-size: 0.9rem;
        z-index: 10001;            /* Zawsze na wierzchu */
        border-bottom: 2px solid #000;
    }
    
    .skip-link:hover, .skip-link:focus {
        background: #e6b800;       /* Lekka zmiana koloru po najechaniu */
        color: #000;
        text-decoration: underline;
    }

    /* --- Style Bazowe --- */
    body {
        background-color: var(--bg-dark);
        color: var(--text-main);
        font-family: 'Roboto', sans-serif;
        line-height: 1.6;
    }

    h1, h2, h3, h4, h5, .navbar-brand, .btn-custom {
        font-family: 'Orbitron', sans-serif;
        letter-spacing: 1px;
    }

    /* Nadpisanie domyślnego muted bootstrapa na ciemnym tle (żeby był czytelniejszy bez trybu kontrastu) */
    .text-muted {
        color: var(--text-muted) !important;
    }

    /* --- WAŻNE: Tryb Wysokiego Kontrastu (Fix) --- */
    body.high-contrast {
        background-color: #000000 !important;
        color: #ffff00 !important;
    }
    
    /* Tutaj jest poprawka o którą prosiłeś: */
    body.high-contrast .text-muted,
    body.high-contrast .text-secondary,
    body.high-contrast p,
    body.high-contrast span {
        color: #ffff00 !important; /* Wszystkie teksty na żółto */
    }

    body.high-contrast .navbar, 
    body.high-contrast .card,
    body.high-contrast footer,
    body.high-contrast .border {
        background-color: #000000 !important;
        border-color: #ffff00 !important; /* Ramki też na żółto */
    }

    body.high-contrast a, 
    body.high-contrast i,
    body.high-contrast .price-tag,
    body.high-contrast h1, 
    body.high-contrast h2, 
    body.high-contrast h3, 
    body.high-contrast h4, 
    body.high-contrast h5 {
        color: #ffff00 !important;
    }

    body.high-contrast .btn-custom {
        background-color: #000 !important;
        color: #ffff00 !important;
        border: 2px solid #ffff00;
        font-weight: bold;
    }

    body.high-contrast img {
        filter: grayscale(100%) contrast(150%);
    }

    /* --- Tryb Dużej Czcionki --- */
    body.large-font {
        font-size: 1.7rem !important;
    }
    body.large-font h1 { font-size: 4rem; }
    body.large-font h3, body.large-font h5 { font-size: 1.8rem; }
    body.large-font .btn { font-size: 1.2rem; }

    /* --- Elementy Strony --- */
    .navbar {
        background-color: rgba(18, 18, 18, 0.98);
        border-bottom: 1px solid #444;
    }
    .navbar-brand {
        color: var(--accent-color) !important;
        font-size: 1.5rem;
    }
    
    .hero-section {
        background: linear-gradient(rgba(0,0,0,0.8), rgba(0,0,0,0.8)), url('https://images.unsplash.com/photo-1535378437321-6a8fd06827c6?q=80&w=2000&auto=format&fit=crop');
        background-size: cover;
        padding: 80px 0;
        border-bottom: 3px solid var(--primary-color);
    }

    .product-card {
        background-color: var(--card-bg);
        border: 1px solid #444;
        border-radius: 8px;
        transition: transform 0.3s;
        height: 100%;
    }
    .product-card:hover {
        transform: translateY(-5px); 
    }
    
    .price-tag {
        color: var(--accent-color);
        font-weight: bold;
        font-size: 1.3rem;
    }

    .btn-custom {
        background-color: var(--primary-color);
        color: white;
        border: none;
        padding: 10px 25px;
    }
    .btn-custom:hover {
        background-color: #fff;
        color: #000;
    }

    /* Accessibility Panel */
    #a11y-panel {
        position: fixed;
        top: 100px;
        right: 0;
        background: #fff;
        color: #000;
        padding: 10px;
        border-radius: 10px 0 0 10px;
        z-index: 1000;
        box-shadow: -2px 2px 10px rgba(0,0,0,0.5);
        transform: translateX(85%);
        transition: transform 0.3s;
    }
    #a11y-panel:hover, #a11y-panel:focus-within {
        transform: translateX(0);
    }
    #a11y-panel button {
        display: block;
        width: 100%;
        margin-bottom: 5px;
        font-size: 0.9rem;
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
    }
</style>
</head>
<body>

    <a href="#main-content" class="skip-link">Przejdź do głównej treści</a>

    <div id="a11y-panel" aria-label="Panel ułatwień dostępu">
        <div class="a11y-icon"><i class="bi bi-eye"></i></div>
        <h6 class="text-center fw-bold">Ułatwienia</h6>
        <button class="btn btn-sm btn-outline-dark" onclick="toggleContrast()">Wysoki Kontrast</button>
        <button class="btn btn-sm btn-outline-dark" onclick="toggleFontSize()">Powiększ Tekst</button>
        <button class="btn btn-sm btn-danger" onclick="resetA11y()">Resetuj</button>
    </div>

    <nav class="navbar navbar-expand-lg navbar-dark sticky-top" aria-label="Główna nawigacja">
        <div class="container">
            <a class="navbar-brand" href="#">
                <i class="bi bi-robot" aria-hidden="true"></i> ANIMA-PARTS
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Przełącz nawigację">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link active" href="#" aria-current="page">Start</a></li>
                    <li class="nav-item"><a class="nav-link" href="#products">Oferta</a></li>
                    <li class="nav-item ms-3">
                        <a href="#" class="btn btn-outline-light btn-sm">Zaloguj się</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main id="main-content">
        
        <header class="hero-section text-center">
            <div class="container">
                <h1 class="hero-title mb-4">Animatronic Parts</h1>
                <p class="lead mb-5" style="color: #e0e0e0; max-width: 700px; margin: 0 auto;">
                    Oficjalny dystrybutor części zamiennych. Buduj, naprawiaj, ożywiaj.
                </p>
                <a href="#products" class="btn btn-custom btn-lg">Zobacz Katalog <i class="bi bi-arrow-down" aria-hidden="true"></i></a>
            </div>
        </header>

        <section class="container py-5" aria-label="Zalety sklepu">
            <div class="row text-center g-4">
                <div class="col-md-4">
                    <div class="p-3 border border-secondary rounded">
                        <i class="bi bi-shield-check display-4 text-primary" aria-hidden="true"></i>
                        <h2 class="h4 mt-3">Bezpieczeństwo</h2>
                        <p class="text-muted">Atestowane zamki sprężynowe.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="p-3 border border-secondary rounded">
                        <i class="bi bi-truck display-4 text-info" aria-hidden="true"></i>
                        <h2 class="h4 mt-3">Dostawa 24h</h2>
                        <p class="text-muted">Wysyłka kurierem lub dronem.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="p-3 border border-secondary rounded">
                        <i class="bi bi-gear display-4 text-primary" aria-hidden="true"></i>
                        <h2 class="h4 mt-3">Serwis</h2>
                        <p class="text-muted">Wsparcie techników Fazbear Ent.</p>
                    </div>
                </div>
            </div>
        </section>

        <section id="products" class="container py-5">
            <h2 class="text-center mb-5 border-bottom border-primary d-inline-block px-4">Nasze Produkty</h2>
            
            <div class="row g-4">
                <div class="col-md-6 col-lg-3">
                    <div class="product-card h-100 d-flex flex-column">
                        <img src="https://via.placeholder.com/300x200/333/fff?text=Endo+01" class="card-img-top" alt="Metalowa dłoń endoszkieletu z widocznymi przewodami hydraulicznymi">
                        <div class="card-body d-flex flex-column">
                            <h3 class="h5 card-title">Dłoń Endoszkieletu</h3>
                            <p class="card-text text-muted small">Kompatybilna z modelami generacji 1.</p>
                            <div class="mt-auto d-flex justify-content-between align-items-center">
                                <span class="price-tag">499.00 PLN</span>
                                <button class="btn btn-sm btn-custom" aria-label="Dodaj dłoń endoszkieletu do koszyka">
                                    <i class="bi bi-cart-plus" aria-hidden="true"></i> Dodaj
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="product-card h-100 d-flex flex-column">
                        <img src="https://via.placeholder.com/300x200/333/fff?text=Voice+Box" class="card-img-top" alt="Moduł głosowy w kształcie małego głośnika z niebieską diodą">
                        <div class="card-body d-flex flex-column">
                            <h3 class="h5 card-title">Moduł Głosowy</h3>
                            <p class="card-text text-muted small">Syntezer mowy z funkcją śmiechu.</p>
                            <div class="mt-auto d-flex justify-content-between align-items-center">
                                <span class="price-tag">250.00 PLN</span>
                                <button class="btn btn-sm btn-custom" aria-label="Dodaj moduł głosowy do koszyka">
                                    <i class="bi bi-cart-plus" aria-hidden="true"></i> Dodaj
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="product-card h-100 d-flex flex-column">
                        <img src="https://via.placeholder.com/300x200/333/fff?text=Spring+Lock" class="card-img-top" alt="Miedziany mechanizm zatrzasku sprężynowego, widoczne ostre elementy">
                        <div class="card-body d-flex flex-column">
                            <h3 class="h5 card-title">Zatrzask Sprężynowy</h3>
                            <p class="card-text text-muted small">Ostrożnie! Wymaga korby do nakręcania.</p>
                            <div class="mt-auto d-flex justify-content-between align-items-center">
                                <span class="price-tag">89.99 PLN</span>
                                <button class="btn btn-sm btn-custom" aria-label="Dodaj zatrzask sprężynowy do koszyka">
                                    <i class="bi bi-cart-plus" aria-hidden="true"></i> Dodaj
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="product-card h-100 d-flex flex-column">
                        <img src="https://via.placeholder.com/300x200/333/fff?text=CPU+Chip" class="card-img-top" alt="Zielona płytka drukowana procesora z oznaczeniem AI">
                        <div class="card-body d-flex flex-column">
                            <h3 class="h5 card-title">Procesor AI</h3>
                            <p class="card-text text-muted small">Do autonomicznego poruszania się w nocy.</p>
                            <div class="mt-auto d-flex justify-content-between align-items-center">
                                <span class="price-tag">1200.00 PLN</span>
                                <button class="btn btn-sm btn-custom" aria-label="Dodaj procesor AI do koszyka">
                                    <i class="bi bi-cart-plus" aria-hidden="true"></i> Dodaj
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>

    <footer class="text-center text-lg-start mt-5 pt-4 border-top border-secondary">
        <div class="container p-4">
            <p class="text-muted">© 2025 Anima-Parts. Sklep przyjazny dostępności (WCAG 2.1).</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        function toggleContrast() {
            document.body.classList.toggle('high-contrast');
            // Zapisz preferencję w localStorage (opcjonalnie)
        }

        function toggleFontSize() {
            document.body.classList.toggle('large-font');
        }

        function resetA11y() {
            document.body.classList.remove('high-contrast');
            document.body.classList.remove('large-font');
        }
    </script>
</body>
</html>