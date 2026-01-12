# Kompatybilność baz danych

Aplikacja MeScrap została zaprojektowana z myślą o uniwersalności i działa z następującymi silnikami baz danych:

## Wspierane bazy danych

- ✅ **SQLite** (domyślna dla rozwoju)
- ✅ **MySQL** (5.7+)
- ✅ **MariaDB** (10.3+)
- ✅ **PostgreSQL** (12+)

## Zmiany dla zapewnienia kompatybilności

### 1. Usunięcie raw SQL specyficznego dla MySQL

**AdminOrderController.php** - Filtrowanie opóźnionych zamówień
- ❌ Przed: `DATE_ADD(created_at, INTERVAL ... DAY) < NOW()` (tylko MySQL)
- ✅ Po: Filtrowanie w PHP używając Carbon: `$order->created_at->copy()->addDays(...)`

**routes/web.php** - Sortowanie produktów
- ❌ Przed: `orderByRaw('SUM(order_items.quantity) DESC')`
- ✅ Po: `select(..., DB::raw('SUM(...) as total_quantity'))->orderBy('total_quantity')`

### 2. Użycie standardowych metod Laravel Schema Builder

Wszystkie migracje używają metod wspieranych przez wszystkie bazy:
- `decimal(10, 2)` zamiast specyficznych typów
- `foreignId()->constrained()` dla kluczy obcych
- `timestamps()` dla dat utworzenia/aktualizacji
- `string()`, `text()`, `integer()` - uniwersalne typy

### 3. Konfiguracja

Plik `config/database.php` zawiera gotowe konfiguracje dla:
- SQLite (domyślna: `DB_CONNECTION=sqlite`)
- MySQL/MariaDB (`DB_CONNECTION=mysql`)
- PostgreSQL (`DB_CONNECTION=pgsql`)

## Jak zmienić bazę danych

### Przejście na MySQL:

1. Zainstaluj MySQL Server
2. Utwórz bazę danych: `CREATE DATABASE mescrap CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;`
3. Edytuj `.env`:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=mescrap
DB_USERNAME=root
DB_PASSWORD=twoje_haslo
```
4. Uruchom migracje: `php artisan migrate:fresh --seed`

### Przejście na PostgreSQL:

1. Zainstaluj PostgreSQL Server
2. Utwórz bazę danych: `CREATE DATABASE mescrap WITH ENCODING 'UTF8';`
3. Edytuj `.env`:
```env
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=mescrap
DB_USERNAME=postgres
DB_PASSWORD=twoje_haslo
```
4. Uruchom migracje: `php artisan migrate:fresh --seed`

## Testowanie kompatybilności

Aby przetestować aplikację na różnych bazach danych:

1. Przygotuj środowisko z wybraną bazą danych
2. Skonfiguruj `.env` zgodnie z powyższymi instrukcjami
3. Uruchom migracje: `php artisan migrate:fresh --seed`
4. Uruchom testy: `php artisan test`
5. Przetestuj funkcjonalności ręcznie:
   - Lista produktów
   - Koszyk i zamówienia
   - Panel admina (użytkownicy, zamówienia)
   - Filtrowanie opóźnionych zamówień

## Uwagi techniczne

- **Carbon** używany do obliczeń dat (działa identycznie na wszystkich bazach)
- **Eloquent ORM** abstrahuje różnice między bazami danych
- **Laravel Query Builder** generuje odpowiednie zapytania SQL dla każdej bazy
- **Paginacja** działa uniwersalnie dzięki LengthAwarePaginator
- **Transakcje** (`DB::beginTransaction()`, `DB::commit()`) wspierane przez wszystkie bazy

## Znane ograniczenia

Żadnych. Aplikacja jest w pełni kompatybilna z wymienionymi bazami danych.
