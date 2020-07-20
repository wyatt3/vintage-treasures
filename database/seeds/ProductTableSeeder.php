<?php

use Illuminate\Database\Seeder;
use App\Product;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = new Product([
            'title' => 'Sold Product',
            'imageName' => 'products\\July2020\\product.png',
            'price' => 22.99,
            'description' => 'Product Description for sold product',
            'sold' => 1,
        ]);
        $product->save();
        for($i=1; $i <= 25; $i++) {
            $product = new Product([
                'title' => 'Product ' . strval($i),
                'imageName' => 'products\\July2020\\product.png',
                'price' => $i * 3.14,
                'description' => 'Product Description Lorem Ipsum dolor sit amet.',
                'sold' => 0
            ]);
            $product->save();
        }
    }
}
