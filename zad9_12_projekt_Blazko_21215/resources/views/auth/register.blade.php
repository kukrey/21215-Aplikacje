<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rejestracja - Animatronic Parts</title>
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
        }
        
        body {
            background-color: var(--bg-dark);
            color: var(--text-main);
            font-family: 'Roboto', sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        
        .register-container {
            background: linear-gradient(135deg, rgba(157, 78, 221, 0.2), rgba(0, 229, 255, 0.1));
            border: 2px solid rgba(157, 78, 221, 0.5);
            border-radius: 12px;
            padding: 40px;
            max-width: 450px;
            width: 100%;
            box-shadow: 0 8px 32px rgba(157, 78, 221, 0.2);
        }
        
        .register-container h1 {
            font-family: 'Orbitron', sans-serif;
            font-size: 2rem;
            color: var(--accent-color);
            margin-bottom: 30px;
            text-align: center;
        }
        
        .form-label {
            color: var(--text-main);
            margin-bottom: 8px;
        }
        
        .form-control {
            background-color: rgba(30, 30, 36, 0.8);
            border: 1px solid rgba(157, 78, 221, 0.3);
            color: var(--text-main);
            padding: 10px 15px;
            border-radius: 6px;
        }
        
        .form-control:focus {
            background-color: rgba(30, 30, 36, 0.9);
            border-color: var(--primary-color);
            box-shadow: 0 0 8px rgba(157, 78, 221, 0.3);
            color: var(--text-main);
        }
        
        .btn-action {
            background: linear-gradient(135deg, var(--primary-color), #c77dff);
            color: white;
            border: none;
            padding: 12px 30px;
            border-radius: 6px;
            font-weight: 600;
            width: 100%;
            transition: all 0.3s ease;
        }
        
        .btn-action:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(157, 78, 221, 0.4);
            color: white;
        }
        
        .text-center a {
            color: var(--accent-color);
            text-decoration: none;
        }
        
        .text-center a:hover {
            color: #ffffff;
        }
        
        .alert {
            background-color: rgba(220, 53, 69, 0.2);
            border: 1px solid rgba(220, 53, 69, 0.5);
            color: #ff6b6b;
            font-size: 0.9rem;
        }

        /* Accessibility panel styles (copied from welcome page) */
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
        }
        .a11y-icon:focus-visible {
            outline: 3px solid #0066ff !important;
            outline-offset: 2px;
        }

        /* High contrast mode */
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
        body.high-contrast .btn-action {
            background-color: #000 !important;
            color: #ffff00 !important;
            border: 2px solid #ffff00;
            font-weight: bold;
        }

        /* Make labels and form text readable in high-contrast mode */
        body.high-contrast .form-label,
        body.high-contrast label {
            color: #ffff00 !important;
        }

        body.high-contrast .form-control,
        body.high-contrast input,
        body.high-contrast input::placeholder,
        body.high-contrast input[type="password"] {
            color: #ffff00 !important;
            background-color: #000 !important;
            border-color: #ffff00 !important;
        }

        /* Large font mode */
        body.large-font { font-size: 1.7rem !important; }
        body.large-font h1 { font-size: 4rem; }
        body.large-font .btn { font-size: 1.2rem; }
    </style>
</head>
<body>
    <div id="a11y-panel" aria-label="Panel ułatwień dostępu" role="region">
        <h6 class="text-center fw-bold" id="a11y-title">Ułatwienia</h6>
        <button class="btn btn-sm btn-outline-dark" onclick="toggleContrast()" aria-label="Włącz wysoki kontrast dla lepszej czytelności" aria-pressed="false" id="contrast-btn">Wysoki Kontrast</button>
        <button class="btn btn-sm btn-outline-dark" onclick="toggleFontSize()" aria-label="Powiększ tekst do 170% rozmiaru" aria-pressed="false" id="font-btn">Powiększ Tekst</button>
        <button class="btn btn-sm btn-danger" onclick="resetA11y()" aria-label="Resetuj wszystkie ustawienia dostępności">Resetuj</button>
    </div>

    <div class="register-container">
        <h1>Rejestracja</h1>
        
        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Błąd!</strong>
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
        <form method="POST" action="{{ route('auth.register.post') }}">
            @csrf
            
            <div class="mb-3">
                <label for="name" class="form-label">Imię i nazwisko</label>
                <input type="text" class="form-control" id="name" name="name" required value="{{ old('name') }}">
            </div>
            
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required value="{{ old('email') }}" pattern="^[^@\s]+@[^@\s]+\.[^@\s]+$" title="Adres email musi mieć format user@example.com">
            </div>
            
            <div class="mb-3">
                <label for="password" class="form-label">Hasło</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Powtórz hasło</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
            </div>
            
            <button type="submit" class="btn btn-action mb-3">Zarejestruj się</button>
            
            <div class="text-center">
                <p>Masz już konto? <a href="{{ route('auth.login') }}">Zaloguj się</a></p>
            </div>
        </form>
    </div>

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

        document.addEventListener('DOMContentLoaded', () => {
            if (localStorage.getItem('high-contrast') === 'true') {
                document.body.classList.add('high-contrast');
                const cb = document.getElementById('contrast-btn'); if(cb) cb.setAttribute('aria-pressed', 'true');
            }
            if (localStorage.getItem('large-font') === 'true') {
                document.body.classList.add('large-font');
                const fb = document.getElementById('font-btn'); if(fb) fb.setAttribute('aria-pressed', 'true');
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
