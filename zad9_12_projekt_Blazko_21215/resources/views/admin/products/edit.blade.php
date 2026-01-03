@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <h1 class="mb-4">
                <i class="bi bi-pencil-square"></i> Edycja Ceny Produktu
            </h1>

            <div class="card bg-dark border-secondary">
                <div class="card-body">
                    <h5 class="card-title">{{ $product->name }}</h5>
                    
                    <div class="mb-3">
                        <label class="form-label text-muted">Producent:</label>
                        <p class="text-white">{{ $product->manufacturer?->name ?? 'Brak' }}</p>
                    </div>

                    <div class="mb-3">
                        <label class="form-label text-muted">Kategoria:</label>
                        <p class="text-white">{{ $product->category?->name ?? 'Brak' }}</p>
                    </div>

                    <form action="{{ route('admin.products.price', $product) }}" method="POST">
                        @csrf
                        @method('PATCH')

                        <div class="mb-3">
                            <label for="price" class="form-label">Nowa Cena (zł)</label>
                            <input type="number" 
                                   class="form-control @error('price') is-invalid @enderror" 
                                   id="price" 
                                   name="price" 
                                   step="0.01" 
                                   value="{{ old('price', $product->price) }}"
                                   required>
                            @error('price')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-check-circle"></i> Zaktualizuj Cenę
                            </button>
                            <a href="{{ route('admin.products') }}" class="btn btn-secondary">
                                <i class="bi bi-arrow-left"></i> Anuluj
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
