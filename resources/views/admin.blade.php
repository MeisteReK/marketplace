<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{ __('Admin Dashboard') }}</div>
                        <div class="card-body">
                            <p>Welcome, admin! Here you can manage the application.</p>
                            <a href="{{ route('products.index') }}" class="btn btn-primary mb-3">Manage Products</a>
                            <a href="{{ route('users.index') }}" class="btn btn-secondary mb-3">Manage Users</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
