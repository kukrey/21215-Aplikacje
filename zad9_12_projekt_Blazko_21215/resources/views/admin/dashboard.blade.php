@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <h1 class="mb-4">
                <img src="{{ asset('Logo.png') }}" alt="Logo" style="height: 48px; margin-right: 8px;"> Panel Administratora
            </h1>
        </div>
    </div>

    <!-- Stats -->
    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card bg-dark border-primary">
                <div class="card-body">
                    <h5 class="card-title text-primary">Produkty</h5>
                    <p class="card-text text-muted">{{ $totalProducts }}</p>
                    <a href="{{ route('admin.products') }}" class="btn btn-sm btn-primary">Zarządzaj</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-dark border-success">
                <div class="card-body">
                    <h5 class="card-title text-success">Użytkownicy</h5>
                    <p class="card-text text-muted">{{ $totalUsers }}</p>
                    <a href="{{ route('admin.users.index') }}" class="btn btn-sm btn-success">Zarządzaj</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-dark border-info">
                <div class="card-body">
                    <h5 class="card-title text-info">Zamówienia</h5>
                    <p class="card-text text-muted">{{ $totalOrders }}</p>
                    <a href="{{ route('admin.orders.index') }}" class="btn btn-sm btn-info">Zarządzaj</a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="card bg-dark border-secondary">
                <div class="card-header border-secondary">
                    <h5 class="mb-0">Edycja Produktów</h5>
                </div>
                <div class="card-body">
                    <p class="text-muted">Zmień ceny lub usuń produkty ze sklepu.</p>
                    <a href="{{ route('admin.products') }}" class="btn btn-primary">
                        <i class="bi bi-pencil"></i> Zarządzaj Produktami
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-dark border-secondary">
                <div class="card-header border-secondary">
                    <h5 class="mb-0">Zarządzanie Użytkownikami</h5>
                </div>
                <div class="card-body">
                    <p class="text-muted">Przeglądaj użytkowników i usuń nieaktywnych.</p>
                    <a href="{{ route('admin.users.index') }}" class="btn btn-success">
                        <i class="bi bi-people"></i> Lista Użytkowników
                    </a>
                    <a href="{{ route('admin.users.inactive') }}" class="btn btn-warning mt-2">
                        <i class="bi bi-clock-history"></i> Nieaktywni (6+ mies.)
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-dark border-secondary">
                <div class="card-header border-secondary">
                    <h5 class="mb-0">Wyszukaj Użytkownika</h5>
                </div>
                <div class="card-body">
                    <p class="text-muted">Sprawdź co zamówił dany użytkownik.</p>
                    <a href="{{ route('admin.users.search') }}" class="btn btn-primary">
                        <i class="bi bi-search"></i> Wyszukaj
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card bg-dark border-secondary">
                <div class="card-header border-secondary">
                    <h5 class="mb-0">Zarządzanie Zamówieniami</h5>
                </div>
                <div class="card-body">
                    <p class="text-muted">Przeglądaj zamówienia, anuluj je lub dokonuj zwrotów przy przekroczeniu czasu dostawy.</p>
                    <a href="{{ route('admin.orders.index') }}" class="btn btn-info">
                        <i class="bi bi-box-seam"></i> Wszystkie Zamówienia
                    </a>
                    <a href="{{ route('admin.orders.index', ['overdue' => '1']) }}" class="btn btn-danger ms-2">
                        <i class="bi bi-exclamation-triangle"></i> Opóźnione Zamówienia
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
