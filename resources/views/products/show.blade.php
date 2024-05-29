<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Product Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header bg-primary text-white">
                            {{ $product->name }}
                        </div>
                        <div class="card-body">
                            @if($product->image)
                                <div class="text-center mb-3">
                                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="img-fluid">
                                </div>
                            @endif
                            <p class="lead">{{ $product->description }}</p>
                            <p class="font-weight-bold">Price: ${{ number_format($product->price, 2) }}</p>
                            <a href="{{ route('products.index') }}" class="btn btn-secondary">Back to Products</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
