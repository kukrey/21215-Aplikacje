<!DOCTYPE html>

<html lang="pl">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description" content="Oficjalny dystrybutor części zamiennych do animatroniki. Buduj, naprawiaj, ożywiaj. Dostawa 24h, bezpieczne, dostępne dla wszystkich użytkowników.">

    <meta name="keywords" content="animatronica, części zamienne, dystrybutor, dostawa, sklep">

    <meta name="author" content="Animatronic Parts">

    <!-- WCAG 2.1 - Deklaracja standardu dostępności -->

    <meta name="accessibility" content="WCAG 2.1 AA">

    <meta name="color-scheme" content="dark light">

    <title>Animatronic Parts - Sklep (WCAG 2.1)</title>

    

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
        line-height: 1.8;
        font-size: 16px;
        letter-spacing: 0.5px;
        word-spacing: 0.2em;

    }

    h1, h2, h3, h4, h5, .navbar-brand, .btn-custom {

        font-family: 'Orbitron', sans-serif;

        letter-spacing: 1px;

    }

    /* WCAG 2.1 AA - Kontrast 4.5:1 dla normalnego tekstu */

    .text-muted {

        color: #c0c0c0 !important;

    }

    /* WCAG 2.1 - Wymagana hierarchia nagłówków */

    h1 { font-size: 2.5rem; font-weight: 700; margin: 1rem 0; }

    h2 { font-size: 2rem; font-weight: 700; margin: 0.875rem 0; }

    h3 { font-size: 1.75rem; font-weight: 600; margin: 0.875rem 0; }



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

    body.high-contrast .nav-link,

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

    

    /* WCAG 2.1 - Linki muszą mieć kontrast 4.5:1 */

    a {

        color: #00e5ff;

        text-decoration: underline;

    }

    
    a:hover {

        color: #ffffff;

        text-decoration: underline double;

    }

    
    a:focus-visible {

        outline: 3px solid #ffcc00;

        outline-offset: 2px;

    }

    

    /* WCAG 2.1 - Lepszy kontrast dla nawigacji */

    .navbar-nav .nav-link {

        color: #e0e0e0 !important;

        transition: color 0.2s ease;

    }

    
    .navbar-nav .nav-link:hover,

    .navbar-nav .nav-link:focus-visible {

        color: #ffffff !important;

    }

    

    .hero-section {

        background: linear-gradient(135deg, rgba(157, 78, 221, 0.2), rgba(0, 229, 255, 0.1)), linear-gradient(rgba(0,0,0,0.75), rgba(0,0,0,0.75)), url('https://images.unsplash.com/photo-1535378437321-6a8fd06827c6?q=80&w=2000&auto=format&fit=crop');

        background-size: cover;

        background-position: center;

        padding: 120px 0;

        border-bottom: 4px solid var(--primary-color);

        position: relative;

        overflow: hidden;

        animation: fadeInDown 0.8s ease-out;

    }

    

    .hero-section::before {

        content: '';

        position: absolute;

        top: 0;

        left: 0;

        right: 0;

        bottom: 0;

        background: radial-gradient(circle at 20% 50%, rgba(157, 78, 221, 0.1) 0%, transparent 50%),

                    radial-gradient(circle at 80% 80%, rgba(0, 229, 255, 0.1) 0%, transparent 50%);

        pointer-events: none;

    }

    

    .hero-section .container {

        position: relative;

        z-index: 1;

    }

    

    .hero-title {

        font-size: 3.5rem;

        font-weight: 700;

        background: linear-gradient(135deg, var(--accent-color), var(--primary-color));

        -webkit-background-clip: text;

        -webkit-text-fill-color: transparent;

        background-clip: text;

        animation: fadeInUp 0.8s ease-out 0.2s backwards;

        letter-spacing: 2px;

        text-shadow: 0 10px 30px rgba(0, 229, 255, 0.3);

    }

    

    .hero-section .lead {

        animation: fadeInUp 0.8s ease-out 0.4s backwards !important;

        font-size: 1.3rem;

        font-weight: 300;

        letter-spacing: 0.5px;

    }



    .product-card {

        background-color: var(--card-bg);

        border: 1px solid rgba(157, 78, 221, 0.3);

        border-radius: 12px;

        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);

        height: 100%;

        overflow: hidden;

        position: relative;

        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.3);

        animation: fadeInUp 0.6s ease-out backwards;

    }

    
    .product-card:nth-child(1) { animation-delay: 0.1s; }

    .product-card:nth-child(2) { animation-delay: 0.2s; }

    .product-card:nth-child(3) { animation-delay: 0.3s; }

    .product-card:nth-child(4) { animation-delay: 0.4s; }

    
    .product-card::before {

        content: '';

        position: absolute;

        top: 0;

        left: 0;

        right: 0;

        height: 4px;

        background: linear-gradient(90deg, var(--primary-color), var(--accent-color));

        transform: scaleX(0);

        transform-origin: left;

        transition: transform 0.4s ease;

        z-index: 1;

    }

    
    .product-card:hover {

        transform: translateY(-10px);

        border-color: var(--primary-color);

        box-shadow: 0 15px 40px rgba(157, 78, 221, 0.3);

    }
    
    .product-card:hover::before {

        transform: scaleX(1);

    }

    
    .product-card img {

        transition: transform 0.4s ease;

    }
    
    .product-card:hover img {

        transform: scale(1.05);

    }

    

    .price-tag {

        color: var(--accent-color);

        font-weight: bold;

        font-size: 1.4rem;

        background: rgba(0, 229, 255, 0.1);

        padding: 5px 12px;

        border-radius: 6px;

        border: 1px solid rgba(0, 229, 255, 0.3);

        transition: all 0.3s ease;

    }

    
    .product-card:hover .price-tag {

        background: rgba(0, 229, 255, 0.2);

        box-shadow: 0 0 15px rgba(0, 229, 255, 0.3);

    }



    .btn-custom {

        background: linear-gradient(135deg, var(--primary-color), #c77dff);

        color: white;

        border: 2px solid var(--primary-color);

        padding: 12px 32px;

        font-weight: 600;

        letter-spacing: 1px;

        transition: all 0.3s ease;

        position: relative;

        overflow: hidden;

        /* WCAG 2.1 - Cel dotykowy 44x44px minimum */

        min-height: 44px;

        display: inline-flex;

        align-items: center;

        justify-content: center;

        border-radius: 4px;

        cursor: pointer;

        text-decoration: none;

    }

    
    .btn-custom::before {

        content: '';

        position: absolute;

        top: 0;

        left: -100%;

        width: 100%;

        height: 100%;

        background: rgba(255, 255, 255, 0.2);

        transition: left 0.3s ease;

    }

    
    .btn-custom:hover {

        background: linear-gradient(135deg, #c77dff, var(--primary-color));

        color: white;

        transform: translateY(-3px);

        box-shadow: 0 10px 30px rgba(157, 78, 221, 0.4);

    }
    
    .btn-custom:hover::before {

        left: 100%;

    }

    

    /* WCAG 2.1 - Wymagany widoczny fokus dla klawiatury */

    .btn-custom:focus-visible {

        outline: 3px solid #ffcc00 !important;

        outline-offset: 2px;

    }

    

    .btn-custom:active {

        outline: 3px solid #ffcc00;

        outline-offset: 2px;

    }



    /* Accessibility Panel */

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

        /* WCAG 2.1 - Cel dotykowy 44px */

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

        padding: 8px;

        border-radius: 5px 0 0 5px;

        cursor: pointer;

        font-size: 1.5rem;

        /* WCAG 2.1 - Cel dotykowy */

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

    

    /* Footer */

    footer {

        background: linear-gradient(135deg, rgba(18, 18, 18, 0.95), rgba(30, 30, 36, 0.95));

        border-top: 3px solid var(--primary-color);

        padding-top: 2rem;

        padding-bottom: 1rem;

    }

    
    footer p {

        animation: fadeInUp 0.8s ease-out 0.6s backwards;

    }

    

    /* ---- Animacje ---- */

    @keyframes fadeInDown {

        from {

            opacity: 0;

            transform: translateY(-30px);

        }

        to {

            opacity: 1;

            transform: translateY(0);

        }

    }

    

    @keyframes fadeInUp {

        from {

            opacity: 0;

            transform: translateY(30px);

        }

        to {

            opacity: 1;

            transform: translateY(0);

        }

    }

    

    @keyframes slideInLeft {

        from {

            opacity: 0;

            transform: translateX(-30px);

        }

        to {

            opacity: 1;

            transform: translateX(0);

        }

    }

    

    @keyframes pulse-glow {

        0%, 100% {

            box-shadow: 0 0 10px rgba(157, 78, 221, 0.3);

        }

        50% {

            box-shadow: 0 0 30px rgba(157, 78, 221, 0.6);

        }

    }

    

    /* ---- Sekcja Zalet ---- */

    .benefits-card {

        background: linear-gradient(135deg, rgba(157, 78, 221, 0.2), rgba(0, 229, 255, 0.1));

        border: 2px solid rgba(157, 78, 221, 0.5);

        border-radius: 12px;

        padding: 30px;

        transition: all 0.4s ease;

        position: relative;

        overflow: hidden;

        animation: fadeInUp 0.6s ease-out backwards;

    }

    

    .benefits-card h2 {

        color: #ffffff;

            border: none; /* Removed border */

    

    .benefits-card p {

        color: #e0e0e0;

    }

    

    .benefits-card:nth-child(1) { animation-delay: 0.1s; }

    .benefits-card:nth-child(2) { animation-delay: 0.2s; }

    .benefits-card:nth-child(3) { animation-delay: 0.3s; }

    

    .benefits-card::before {

        content: '';

        position: absolute;

        top: 0;

        left: 0;

        right: 0;

        bottom: 0;

        background: linear-gradient(135deg, var(--primary-color), var(--accent-color));

        opacity: 0;

        transition: opacity 0.4s ease;

        z-index: -1;

    }

    

    .benefits-card:hover {

        transform: translateY(-8px);

        border-color: var(--primary-color);

        box-shadow: 0 15px 35px rgba(157, 78, 221, 0.3);

    }

    

    .benefits-card:hover::before {

        opacity: 0.05;

    }

    

    .benefits-card i {

        animation: pulse 2s ease-in-out infinite;

    }

    

    .benefits-card:hover i {

        animation: bounce 0.6s ease-in-out;

    }

    

    @keyframes pulse {

        0%, 100% { opacity: 1; }

        50% { opacity: 0.6; }

    }

    

    @keyframes bounce {

        0%, 100% { transform: translateY(0); }

        50% { transform: translateY(-10px); }

    }

    

    /* WCAG 2.1 - Respektowanie preferencji redukcji ruchu */

    @media (prefers-reduced-motion: reduce) {

        * {

            animation-duration: 0.01ms !important;

            animation-iteration-count: 1 !important;

            transition-duration: 0.01ms !important;

        }

    }

    

    /* WCAG 2.1 - Lepszy kontrast dla trybu wysokiego kontrastu */

    @media (prefers-contrast: more) {

        :root {

            --primary-color: #b366ff;

            --accent-color: #00ffff;

        }

        body { color: #ffffff; }

        .text-muted { color: #ffffff !important; }

    }

    

    /* WCAG 2.1 - Wsparcie trybu jasnego użytkownika */

    @media (prefers-color-scheme: light) {

        :root {

            --bg-dark: #f5f5f5;

            --card-bg: #ffffff;

            --text-main: #212121;

            --text-muted: #555555;

        }

        body {

            background-color: var(--bg-dark);

            color: var(--text-main);

        }

        .hero-section { filter: brightness(1.1); }

    }

</style>

</head>

<body>



    <a href="#main-content" class="skip-link">Przejdź do głównej treści</a>



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

                <i class="bi bi-robot" aria-hidden="true"></i> ANIMA-PARTS

            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Przełącz nawigację">

                <span class="navbar-toggler-icon"></span>

            </button>

            <div class="collapse navbar-collapse" id="navbarNav">

                <ul class="navbar-nav ms-auto">

                    <li class="nav-item"><a class="nav-link active" href="#main-content" aria-current="page">Start</a></li>

                    <li class="nav-item"><a class="nav-link" href="#products">Oferta</a></li>

                    @guest
                    <li class="nav-item ms-3">
                        <a href="{{ route('auth.login') }}" class="btn btn-outline-light btn-sm" aria-label="Przejdź do strony logowania">Zaloguj się</a>
                    </li>
                    <li class="nav-item ms-2">
                        <a href="{{ route('auth.register') }}" class="btn btn-outline-light btn-sm" aria-label="Przejdź do rejestracji">Rejestracja</a>
                    </li>
                    @endguest

                    @auth
                    <li class="nav-item ms-3">
                        <span class="nav-text" style="color: var(--text-main); margin-right: 15px;">{{ Auth::user()->name }}</span>
                    </li>
                    @if(Auth::user()->isAdmin())
                    <li class="nav-item">
                        <a href="#" class="nav-link" style="color: var(--accent-color);" title="Panel administratora"><i class="bi bi-gear"></i> Admin</a>
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

        

        <header class="hero-section text-center" role="region" aria-label="Sekcja główna">

            <div class="container">

                <h1 class="hero-title mb-4">Animatronic Parts</h1>

                <p class="lead mb-5" style="color: #e0e0e0; max-width: 700px; margin: 0 auto;">

                    Oficjalny dystrybutor części zamiennych. Buduj, naprawiaj, ożywiaj.

                </p>

                <a href="#products" class="btn btn-custom btn-lg" aria-label="Przejdź do katalogu produktów">Zobacz Katalog <i class="bi bi-arrow-down" aria-hidden="true"></i></a>

            </div>

        </header>



        <section class="container py-5" aria-label="Zalety sklepu">

            <div class="row text-center g-4">

                <div class="col-md-4">

                    <div class="benefits-card">

                        <i class="bi bi-shield-check display-4 text-primary" aria-hidden="true"></i>

                        <h2 class="h4 mt-3">Bezpieczeństwo</h2>

                        <p class="text-muted">Atestowane zamki sprężynowe.</p>

                    </div>

                </div>

                <div class="col-md-4">

                    <div class="benefits-card">

                        <i class="bi bi-truck display-4 text-info" aria-hidden="true"></i>

                        <h2 class="h4 mt-3">Dostawa 24h</h2>

                        <p class="text-muted">Wysyłka kurierem lub dronem.</p>

                    </div>

                </div>

                <div class="col-md-4">

                    <div class="benefits-card">

                        <i class="bi bi-gear display-4 text-primary" aria-hidden="true"></i>

                        <h2 class="h4 mt-3">Serwis</h2>

                        <p class="text-muted">Wsparcie techników Fazbear Ent.</p>

                    </div>

                </div>

            </div>

        </section>



        <section id="products" class="container py-5" aria-label="Katalog produktów" role="region">

            <div class="text-center mb-5">

                <h2 class="display-5 mb-3" style="background: linear-gradient(135deg, var(--accent-color), var(--primary-color)); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text; font-weight: 700;">Nasze Produkty</h2>

                <div style="width: 60px; height: 4px; background: linear-gradient(90deg, var(--primary-color), var(--accent-color)); margin: 0 auto;"></div>

            </div>

            

            <div class="row g-4" role="list">

                <div class="col-md-6 col-lg-3">

                    <div class="product-card h-100 d-flex flex-column" role="listitem" aria-label="Dłoń Endoszkieletu, cena 499.00 PLN">

                        <img src="https://via.placeholder.com/300x200/333/fff?text=Endo+01" class="card-img-top" alt="Metalowa dłoń endoszkieletu z widocznymi przewodami hydraulicznymi">

                        <div class="card-body d-flex flex-column">

                            <h3 class="h5 card-title">Dłoń Endoszkieletu</h3>

                            <p class="card-text text-muted small">Kompatybilna z modelami generacji 1.</p>

                            <div class="mt-auto d-flex justify-content-between align-items-center">

                                <span class="price-tag" aria-label="Cena: 499 złotych">499.00 PLN</span>

                                <button class="btn btn-sm btn-custom" aria-label="Dodaj dłoń endoszkieletu za 499 złotych do koszyka">

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

    <footer class="text-center text-lg-start mt-5 pt-4 border-top border-secondary" role="contentinfo" aria-label="Informacje o stronie">

        <div class="container p-4">

            <p class="text-muted">© 2025 Anima-Parts. Sklep spełniający wymagania dostępności <abbr title="Web Content Accessibility Guidelines">WCAG</abbr> 2.1 poziom AA.</p>

            <p class="text-muted small">

                <a href="#" aria-label="Oświadczenie dostępności">Oświadczenie dostępności</a> | 

                <a href="#" aria-label="Polityka prywatności">Polityka prywatności</a> | 

                <a href="#" aria-label="Warunki użytkowania">Warunki użytkowania</a>

            </p>

        </div>

    </footer>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>

        /* WCAG 2.1 - Dostępne funkcje z komunikatami dla czytników ekranu */

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