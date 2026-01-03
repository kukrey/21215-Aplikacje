@extends('layouts.app')

@section('content')
<style>
    .card-body p {
        color: #ffffff !important;
    }
    .card-body strong {
        color: #e0e0e0 !important;
    }
    .card-header h5, .card-header h6 {
        color: #ffffff !important;
    }
    .table td, .table th {
        color: #ffffff !important;
    }
    
    /* High contrast mode */
    body.high-contrast .card-body p,
    body.high-contrast .card-body strong,
    body.high-contrast .card-header h5,
    body.high-contrast .card-header h6,
    body.high-contrast .table td,
    body.high-contrast .table th,
    body.high-contrast .text-info,
    body.high-contrast .text-success {
        color: #ffff00 !important;
    }
</style>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <h1 class="mb-4">
                <i class="bi bi-search"></i> Wyszukaj Użytkownika
            </h1>

            <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary mb-4">
                <i class="bi bi-arrow-left"></i> Powrót do panelu
            </a>

            <div class="card bg-dark border-secondary mb-4">
                <div class="card-body">
                    <form method="GET" action="{{ route('admin.users.search') }}" class="d-flex gap-2">
                        <input type="text" 
                               class="form-control" 
                               name="search" 
                               placeholder="Wpisz imię lub nazwę użytkownika..."
                               value="{{ $search ?? '' }}"
                               required>
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-search"></i> Szukaj
                        </button>
                    </form>
                </div>
            </div>

            @if ($search && !$user)
                <div class="alert alert-warning" role="alert">
                    <i class="bi bi-exclamation-triangle"></i> Użytkownik "{{ $search }}" nie został znaleziony.
                </div>
            @endif

            @if ($user)
                <div class="card bg-dark border-success mb-4">
                    <div class="card-header border-success">
                        <h5 class="mb-0">Informacje o Użytkowniku</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <p><strong>Imię/Nazwa:</strong> <span class="text-info">{{ $user->name }}</span></p>
                                <p><strong>Email:</strong> <span class="text-info">{{ $user->email }}</span></p>
                                <p><strong>Rola:</strong> <span class="text-info">{{ $user->role?->name ?? 'Brak' }}</span></p>
                            </div>
                            <div class="col-md-6">
                                <p><strong>ID:</strong> {{ $user->id }}</p>
                                <p><strong>Dołączył:</strong> {{ $user->created_at->format('d.m.Y H:i') }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                @if ($orders && $orders->count() > 0)
                    <h3 class="mb-3">Zamówienia ({{ $orders->count() }})</h3>

                    @foreach ($orders as $order)
                        <div class="card bg-dark border-secondary mb-3">
                            <div class="card-header border-secondary">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h6 class="mb-0">Zamówienie #{{ $order->id }}</h6>
                                    <span class="badge bg-{{ $order->status?->name === 'Zrealizowane' ? 'success' : 'warning' }}">
                                        {{ $order->status?->name ?? 'Nieznany' }}
                                    </span>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <p><strong>Data:</strong> {{ $order->created_at->format('d.m.Y H:i') }}</p>
                                        <p><strong>Wysyłka:</strong> {{ $order->shippingMethod?->name ?? 'Brak' }}</p>
                                    </div>
                                    <div class="col-md-6">
                                        <p><strong>Koszt wysyłki:</strong> <span class="text-info">{{ number_format($order->shipping_cost, 2) }} zł</span></p>
                                    </div>
                                </div>

                                <h6 class="mb-2">Produkty:</h6>
                                <div class="table-responsive">
                                    <table class="table table-dark table-sm">
                                        <thead>
                                            <tr>
                                                <th>Produkt</th>
                                                <th>Ilość</th>
                                                <th>Cena</th>
                                                <th>Razem</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($order->items as $item)
                                                <tr>
                                                    <td>{{ $item->product?->name ?? 'Usunięty produkt' }}</td>
                                                    <td>{{ $item->quantity }}</td>
                                                    <td>{{ number_format($item->price_at_purchase, 2) }} zł</td>
                                                    <td class="text-info">{{ number_format($item->price_at_purchase * $item->quantity, 2) }} zł</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                                <div class="text-end">
                                    <p class="mb-0">
                                        <strong>Razem do zapłaty:</strong>
                                        <span class="text-success fs-5">
                                            {{ number_format($order->items->sum(fn($item) => $item->price_at_purchase * $item->quantity) + $order->shipping_cost, 2) }} zł
                                        </span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    @if ($user)
                        <div class="alert alert-info" role="alert">
                            <i class="bi bi-info-circle"></i> Użytkownik nie złożył jeszcze żadnych zamówień.
                        </div>
                    @endif
                @endif
            @endif
        </div>
    </div>
</div>
@endsection
