<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\User;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $user = User::first();

        Product::create([
            'name' => 'Example Product 1',
            'description' => 'This is an example product description.',
            'price' => 19.99,
            'user_id' => $user->id,
        ]);

        Product::create([
            'name' => 'Example Product 2',
            'description' => 'This is another example product description.',
            'price' => 29.99,
            'user_id' => $user->id,
        ]);
    }
}
