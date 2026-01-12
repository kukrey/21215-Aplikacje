<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nieaktywni Użytkownicy - MeScrap</title>
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
        .table {
            color: var(--text-main);
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
            min-height: 44px;
            min-width: 44px;
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 1001;
        }
        .a11y-icon:focus-visible {
            outline: 3px solid #0066ff !important;
            outline-offset: 2px;
        }

        body.high-contrast .card,
        body.high-contrast .table,
        body.high-contrast .navbar,
        body.high-contrast .page-header {
            background: #000 !important;
            color: #fff !important;
        }
        body.large-font { font-size: 1.1rem; }
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
            <h1 class="page-title display-4">Nieaktywni Użytkownicy</h1>
            <p class="lead" style="color: var(--text-main);">Użytkownicy nieaktywni od 6 miesięcy lub więcej</p>
        </div>
    </div>

    <div class="container mb-5" id="main-content">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Nieaktywni Użytkownicy</h1>
        <div>
            <a href="{{ route('admin.users.index') }}" class="btn btn-primary">Wszyscy użytkownicy</a>
            <a href="{{ route('admin.users.inactive') }}" class="btn btn-warning active">Nieaktywni (6+ mies.)</a>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="alert alert-warning">
        <i class="bi bi-exclamation-triangle"></i>
        <strong>Użytkownicy nieaktywni od 6 miesięcy lub więcej</strong>
        <p class="mb-0 mt-2">Poniżej znajdują się użytkownicy, którzy nie logowali się przez ostatnie 6 miesięcy lub nigdy się nie zalogowali.</p>
    </div>

    @if($users->count() > 0)
    <div class="card mb-3">
        <div class="card-body">
            <form method="POST" action="{{ route('admin.users.bulk-delete') }}" 
                  onsubmit="return confirm('Czy na pewno chcesz usunąć zaznaczonych użytkowników?')" id="bulkDeleteForm">
                @csrf
                <button type="submit" class="btn btn-danger" id="bulkDeleteBtn" disabled>
                    <i class="bi bi-trash"></i> Usuń zaznaczonych
                </button>
                <span class="ms-2 text-muted" id="selectedCount">Zaznaczono: 0</span>
        </div>
    </div>
    @endif

    <div class="card">
        <div class="card-header bg-warning text-dark">
            <h5 class="mb-0">Nieaktywni użytkownicy ({{ $users->total() }})</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>
                                <input type="checkbox" id="selectAll" class="form-check-input">
                            </th>
                            <th>ID</th>
                            <th>Nazwa użytkownika</th>
                            <th>Email</th>
                            <th>Data rejestracji</th>
                            <th>Ostatnie logowanie</th>
                            <th>Czas nieaktywności</th>
                            <th>Akcje</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($users as $user)
                            <tr>
                                <td>
                                    @if($user->id !== auth()->id() && !$user->isAdmin())
                                        <input type="checkbox" name="user_ids[]" value="{{ $user->id }}" 
                                               class="form-check-input user-checkbox" form="bulkDeleteForm">
                                    @endif
                                </td>
                                <td>{{ $user->id }}</td>
                                <td>
                                    <strong>{{ $user->name }}</strong>
                                    @if($user->id === auth()->id())
                                        <span class="badge bg-info">To Ty</span>
                                    @endif
                                </td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->created_at->format('Y-m-d') }}</td>
                                <td>
                                    @if($user->last_login_at)
                                        {{ $user->last_login_at->format('Y-m-d H:i') }}
                                    @else
                                        <span class="text-danger"><strong>Nigdy</strong></span>
                                    @endif
                                </td>
                                <td>
                                    @if($user->last_login_at)
                                        <span class="text-warning">
                                            {{ $user->last_login_at->diffForHumans() }}
                                        </span>
                                    @else
                                        <span class="text-danger">
                                            Nigdy nie zalogowany
                                        </span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('admin.users.password.edit', $user) }}" class="btn btn-sm btn-outline-info me-1">
                                        <i class="bi bi-key"></i> Hasło
                                    </a>

                                    @if($user->id !== auth()->id() && !$user->isAdmin())
                                        <form method="POST" action="{{ route('admin.users.destroy', $user) }}" 
                                              onsubmit="return confirm('Czy na pewno chcesz usunąć użytkownika {{ $user->name }}?')"
                                              style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">
                                                <i class="bi bi-trash"></i> Usuń
                                            </button>
                                        </form>
                                    @else
                                        <span class="text-muted"> </span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center text-success">
                                    <i class="bi bi-check-circle"></i> Brak nieaktywnych użytkowników! Wszyscy są aktywni.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if($users->count() > 0)
            </form>
            @endif

            <div class="mt-3">
                {{ $users->links('vendor.pagination.bootstrap-5') }}
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const selectAll = document.getElementById('selectAll');
    const checkboxes = document.querySelectorAll('.user-checkbox');
    const bulkDeleteBtn = document.getElementById('bulkDeleteBtn');
    const selectedCount = document.getElementById('selectedCount');

    function updateSelection() {
        const checkedCount = document.querySelectorAll('.user-checkbox:checked').length;
        bulkDeleteBtn.disabled = checkedCount === 0;
        selectedCount.textContent = `Zaznaczono: ${checkedCount}`;
    }

    if (selectAll) {
        selectAll.addEventListener('change', function() {
            checkboxes.forEach(cb => cb.checked = this.checked);
            updateSelection();
        });
    }

    checkboxes.forEach(cb => {
        cb.addEventListener('change', updateSelection);
    });
});
</script>

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
