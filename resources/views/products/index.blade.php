<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Products') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{ __('All Products') }}</div>
                        <div class="card-body">
                            <ul class="list-group">
                                @foreach ($products as $product)
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        @if($product->image)
                                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="img-thumbnail" width="100">
                                        @endif
                                        <span>
                                            <a href="{{ route('products.show', $product->id) }}">{{ $product->name }}</a> - ${{ number_format($product->price, 2) }}
                                        </span>
                                        <span>
                                            @if(Auth::check() && (Auth::user()->id == $product->user_id || Auth::user()->role == 1))
                                                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-secondary btn-sm">Edit</a>
                                                <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                                </form>
                                            @endif
                                        </span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
