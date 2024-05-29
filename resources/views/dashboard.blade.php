<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{ __('Dashboard') }}</div>
                            @if(auth()->user()->role === 1)
                            <a href="{{ route('products.index') }}" class="btn btn-primary mb-3">Manage Products</a>
                            <a href="{{ route('users.index') }}" class="btn btn-secondary mb-3">Manage Users</a>
                            @else
                                <a href="{{ route('products.my_offers') }}" class="btn btn-primary mb-3">My Offers</a>
                                <a href="{{ route('products.create') }}" class="btn btn-secondary mb-3">Create New Product</a>
                            @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
