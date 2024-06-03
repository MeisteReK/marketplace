<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'image' => 'nullable|image|max:2048',
        ]);

        $product = new Product($request->except('image'));
        $product->user_id = Auth::id();

        if ($request->hasFile('image')) {
            $product->image = $request->file('image')->store('images', 'public');
        }

        $product->save();

        return redirect()->route('products.my_offers')->with('success', 'Product created successfully.');
    }

    public function edit(Product $product)
    {
        if ($product->user_id == Auth::id() || Auth::user()->role == 1) {
            return view('products.edit', compact('product'));
        } else {
            abort(403);
        }
    }

    public function update(Request $request, Product $product)
    {
        if ($product->user_id == Auth::id() || Auth::user()->role == 1) {
            $request->validate([
                'name' => 'required',
                'description' => 'required',
                'price' => 'required|numeric',
                'image' => 'nullable|image|max:2048'
            ]);

            if ($request->hasFile('image')) {
                $product->image = $request->file('image')->store('images', 'public');
            }

            $product->update($request->except('image'));

            return redirect()->route('products.index')->with('success', 'Product updated successfully.');
        } else {
            abort(403);
        }
    }

    public function destroy(Product $product)
    {
        if ($product->user_id == Auth::id() || Auth::user()->role == 1) {
            $product->delete();
            return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
        } else {
            abort(403);
        }
    }

    public function myOffers()
    {
        $products = Auth::user()->products;
        return view('products.my_offers', compact('products'));
    }
}
