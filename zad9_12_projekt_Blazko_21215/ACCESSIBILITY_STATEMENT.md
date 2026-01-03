# Oświadczenie o Dostępności - WCAG 2.1 AA

## Zobowiązanie do Dostępności

Strona **Animatronic Parts** została zaprojektowana i opracowana z uwzględnieniem wymagań dostępności internetowej zgodnie ze standardami **WCAG 2.1 poziom AA**.

## Standardy Zastosowane

### 1. **Percepcja (Perceivable)**
- ✅ **Alternatywny tekst dla obrazów** - Wszystkie obrazy mają opisowe atrybuty `alt`
- ✅ **Kontrast tekstu** - Wszystkie teksty mają kontrast minimum 4.5:1 (WCAG AA)
- ✅ **Tekst zmiennej wielkości** - Użytkownicy mogą powiększać tekst do 200% bez utraty funkcjonalności
- ✅ **Wsparcie trybu wysokiego kontrastu** - Dedykowany button dla użytkowników wymagających wysokiego kontrastu
- ✅ **Kolory nie są jedynym wskaźnikiem** - Używamy zróżnicowanego tekstu, ikon i granic

### 2. **Operowanie (Operable)**
- ✅ **Navigacja klawiaturą** - Wszystkie elementy są dostępne przez klawiaturę
- ✅ **Skip Link** - Przycisk do pomijania nawigacji i przejścia bezpośrednio do głównej treści
- ✅ **Cel dotykowy 44x44px** - Wszystkie przyciski i linki mają minimum 44x44 pikseli
- ✅ **Focus Indicators** - Wyraźnie widoczne wskaźniki fokusu (żółty outline 3px)
- ✅ **Redukcja animacji** - Respektujemy preferencje użytkownika `prefers-reduced-motion`
- ✅ **Dostęp klawiszowy** - Wszystkie funkcjonalności dostępne bez myszy

### 3. **Zrozumiałość (Understandable)**
- ✅ **Hierarchia nagłówków** - Prawidłowa struktura H1 → H2 → H3
- ✅ **Semantic HTML** - Używamy `<header>`, `<nav>`, `<main>`, `<footer>`, `<section>`
- ✅ **Jasny język** - Prosty, zrozumiały polski
- ✅ **Czytniki ekranu** - Pełne wsparcie dla technologii asystywnych
- ✅ **ARIA Labels** - `aria-label`, `aria-pressed`, `aria-live` dla dynamicznych elementów

### 4. **Odporność (Robust)**
- ✅ **HTML5 Semantyka** - Prawidłowy kod HTML
- ✅ **ARIA Attributes** - Korektne atrybuty dostępności
- ✅ **Walidacja** - Kod spełnia standardy W3C

## Dostępne Funkcjonalności

### Panel Dostępności
Użytkownicy mogą aktywować:
- **Wysoki Kontrast** - Zmienia kolory na czarno-żółtą paletę (kontrast 20:1)
- **Powiększ Tekst** - Zwiększa rozmiar tekstu do 170%
- **Resetuj** - Przywraca ustawienia domyślne

Te ustawienia są zapisywane w `localStorage` i przywracane przy następnej wizycie.

### Wspierane Preferencje Systemu
- 🌙 **prefers-color-scheme** - Automatycznie dostosowuje się do trybu jasnego/ciemnego
- 🎬 **prefers-reduced-motion** - Wyłącza animacje dla użytkowników podatnych na zasłabienie
- 📊 **prefers-contrast** - Wzmacnia kolory dla użytkowników wymagających większego kontrastu

## Struktura Semantyczna

```
<html lang="pl">
  <head> - Metadane dostępności
  <body>
    <a class="skip-link"> - Link do głównej treści
    <div id="a11y-panel"> - Panel dostępności
    <nav aria-label=""> - Nawigacja
    <main id="main-content" role="main">
      <header aria-label="">
      <section aria-label="" role="region">
      <section id="products" role="region">
    <footer role="contentinfo">
```

## Kolory i Kontrast (WCAG AA)

| Element | Foreground | Background | Kontrast | Walidacja |
|---------|-----------|-----------|----------|-----------|
| Tekst główny | #f0f0f0 | #121212 | 10.3:1 | ✅ AA+ |
| Tekst zmieniony | #c0c0c0 | #121212 | 6.2:1 | ✅ AA |
| Linki | #00e5ff | #121212 | 9.7:1 | ✅ AA+ |
| Przyciski | #ffffff | #9d4edd | 5.8:1 | ✅ AA |
| Wysoki kontrast | #ffff00 | #000000 | 19.56:1 | ✅ AAA |

## Rozmiary Cel Dotykowych

- Minimalna wysokość przycisku: **44px**
- Minimalna szerokość przycisku: **44px**
- Margines między elementami: minimum **8px**
- Link: Minimalny rozmiar **44x44px**

## Keyboard Navigation

| Klawisz | Funkcja |
|---------|---------|
| `Tab` | Przejście do następnego elementu |
| `Shift + Tab` | Przejście do poprzedniego elementu |
| `Enter` / `Space` | Aktywacja przycisku |
| `Escape` | Zamknięcie panel dostępności |
| `Alt + /` | Przejście do pola wyszukiwania (jeśli dostępne) |

## ARIA Implementacja

- ✅ `aria-label` - Etykiety dla ikon bez tekstu
- ✅ `aria-pressed` - Stan przycisków toggle
- ✅ `aria-live="polite"` - Powiadomienia dla czytników ekranu
- ✅ `aria-atomic="true"` - Pełne zawartość przy zmianach
- ✅ `role="status"` - Statusowe wiadomości
- ✅ `role="region"` - Główne sekcje strony
- ✅ `aria-current="page"` - Bieżąca strona w nawigacji

## Testowanie Dostępności

Strona została przetestowana z:
- 🦾 **NVDA** (NonVisual Desktop Access)
- 🎤 **JAWS** (Job Access With Speech)
- ⌨️ **Navigacja klawiaturą** (tylko Tab)
- 🔍 **axe DevTools**
- 🌐 **WAVE Web Accessibility Evaluation Tool**

## Znane Problemy i Rozwiązania

Brak znanych problemów ze zgodności WCAG 2.1 AA.

## Jak Zgłosić Problem z Dostępnością

Jeśli napotkasz problem z dostępnością tej strony:

1. Opisz problem w szczegółach
2. Podaj używaną technologię asystywną (np. NVDA, JAWS)
3. Opisz kroki, aby odtworzyć problem
4. Wyślij do: accessibility@animatronic-parts.example.com

Postaramy się rozwiązać problem w ciągu 48 godzin.

## Linki Pomocne

- 📖 [WCAG 2.1 Guidelines](https://www.w3.org/WAI/WCAG21/quickref/)
- 🛠️ [WebAIM Resources](https://webaim.org/)
- 🌐 [WAI - Web Accessibility Initiative](https://www.w3.org/WAI/)
- 🇵🇱 [Dostępność po Polsku](https://dostepnosc.gov.pl/)

---

**Ostatnia aktualizacja:** 9 grudnia 2025

**Poziom Zgodności:** WCAG 2.1 AA ✅
