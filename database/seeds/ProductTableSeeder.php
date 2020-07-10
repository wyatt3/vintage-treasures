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
            'imageName' => 'prodImage.jpg',
            'price' => 22.99,
            'description' => 'Product Description for sold product',
            'sold' => 1,
        ]);
        $product->save();
        for($i=1; $i <= 25; $i++) {
            $product = new Product([
                'title' => 'Product ' . strval($i),
                'imageName' => 'prodImage.jpg',
                'price' => $i * 3.14,
                'description' => 'Product Description Lorem Ipsum dolor sit amet.',
                'sold' => 0
            ]);
            $product->save();
        }
    }
}
