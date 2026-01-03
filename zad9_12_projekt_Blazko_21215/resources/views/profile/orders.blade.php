@extends('layouts.app')

@section('content')
<style>
    .page-header {
        text-align: center;
        margin: 40px 0 20px;
    }
    .orders-card {
        background: var(--card-bg);
        border-radius: 15px;
        padding: 25px;
        box-shadow: 0 8px 32px rgba(157, 78, 221, 0.2);
    }
    .order-row {
        border-bottom: 1px solid rgba(157, 78, 221, 0.3);
        padding: 15px 0;
    }
    .order-row:last-child {
        border-bottom: none;
    }
    .badge-status {
        background: linear-gradient(135deg, rgba(157, 78, 221, 0.2), rgba(0, 229, 255, 0.2));
        border: 1px solid var(--primary-color);
        color: var(--text-main);
    }
    .order-total {
        color: var(--accent-color);
        font-weight: 700;
    }
    .item-line {
        font-size: 0.95rem;
        color: #cfd2ff;
    }
    .empty-state {
        text-align: center;
        padding: 60px 20px;
        background: var(--card-bg);
        border-radius: 15px;
        border: 1px dashed rgba(157, 78, 221, 0.5);
    }
</style>

<div class="container" id="main-content">
        <div class="page-header">
            <h1 class="display-5" style="color: var(--accent-color); font-family: 'Orbitron', monospace;">Historia zamówień</h1>
            <p class="lead">Sprawdź swoje ostatnie zakupy i szczegóły dostawy.</p>
        </div>

        @if($orders->isEmpty())
            <div class="empty-state">
                <i class="bi bi-inbox" style="font-size: 3rem; color: var(--accent-color);"></i>
                <h3 class="mt-3">Brak zamówień</h3>
                <p class="mb-4">Gdy złożysz zamówienie, pojawi się tutaj w historii.</p>
                <a href="{{ route('products.index') }}" class="btn btn-primary" style="background: linear-gradient(135deg, var(--primary-color), var(--accent-color)); border: none;">Przeglądaj produkty</a>
            </div>
        @else
            <div class="orders-card">
                @foreach($orders as $order)
                    @php
                        $itemsTotal = $order->items->sum(fn($i) => $i->price_at_purchase * $i->quantity);
                        $grandTotal = $itemsTotal + $order->shipping_cost - $order->discount_amount;
                    @endphp
                    <div class="order-row">
                        <div class="d-flex justify-content-between align-items-center flex-wrap">
                            <div>
                                <strong>#{{ $order->id }}</strong> • {{ $order->created_at->format('Y-m-d H:i') }}
                                <div class="item-line">{{ $order->shipping_address }}</div>
                            </div>
                            <div class="text-end">
                                <span class="badge badge-status">{{ $order->status?->name ?? 'Brak statusu' }}</span>
                                <div class="order-total mt-1">{{ number_format($grandTotal, 2) }} PLN</div>
                                <small>{{ $order->shippingMethod?->name ?? 'Dostawa' }} • Dostawa: {{ $order->shippingMethod?->delivery_days }} dni</small>
                            </div>
                        </div>
                        <div class="mt-2">
                            @foreach($order->items as $item)
                                <div class="item-line">{{ $item->product->name }} × {{ $item->quantity }} — {{ number_format($item->price_at_purchase * $item->quantity, 2) }} PLN</div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
</div>
@endsection
