<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use Intervention\Image\Facades\Image;

class ProductSeeder extends Seeder
{
    public function run()
    {
        Product::create([
            'name' => 'Product 1',
            'description' => 'Description of Product 1',
            'price' => 10.99,
            'image' => $this->storeImage('product1.jpg'),
        ]);

        Product::create([
            'name' => 'Product 2',
            'description' => 'Description of Product 2',
            'price' => 10.99,
            'image' => $this->storeImage('product2.jpg'), 
        ]);

        Product::create([
            'name' => 'Product 3',
            'description' => 'Description of Product 3',
            'price' => 10.99,
            'image' => $this->storeImage('product3.jpg'), 
        ]);

        Product::create([
            'name' => 'Product 4',
            'description' => 'Description of Product 4',
            'price' => 10.99,
            'image' => $this->storeImage('product4.jpg'), 
        ]);

        Product::create([
            'name' => 'Product 5',
            'description' => 'Description of Product 5',
            'price' => 12.99,
            'image' => $this->storeImage('product5.jpg'), 
        ]);

        Product::create([
            'name' => 'Product 6',
            'description' => 'Description of Product 6',
            'price' => 10.99,
            'image' => $this->storeImage('product6.jpg'), 
        ]);

        Product::create([
            'name' => 'Product 7',
            'description' => 'Description of Product 7',
            'price' => 10.99,
            'image' => $this->storeImage('product7.jpg'), 
        ]);

         Product::create([
            'name' => 'Product 8',
            'description' => 'Description of Product 8',
            'price' => 25.99,
            'image' => $this->storeImage('product8.jpg'),
        ]);

        Product::create([
            'name' => 'Product 9',
            'description' => 'Description of Product 9',
            'price' => 6.99,
            'image' => $this->storeImage('product9.jpg'),
        ]);

        Product::create([
            'name' => 'Product 10',
            'description' => 'Description of Product 10',
            'price' => 8.99,
            'image' => $this->storeImage('product10.jpg'),
        ]);

        Product::create([
            'name' => 'Product 11',
            'description' => 'Description of Product 11',
            'price' => 15.99,
            'image' => $this->storeImage('product11.jpg'),
        ]);

        Product::create([
            'name' => 'Product 12',
            'description' => 'Description of Product 12',
            'price' => 10.99,
            'image' => $this->storeImage('product12.jpg'),
        ]);
    }

    private function storeImage($filename)
    {
        $image = Image::make(public_path('images/' . $filename));

        // Create a thumbnail by resizing the image proportionally
        $thumbnail = $image->fit(200, 200, function ($constraint) {
        $constraint->upsize();
        });

        // Store the thumbnail and return the path
        $thumbnailPath = 'thumbnails/' . $filename;
        $thumbnail->save(public_path($thumbnailPath));

        return $thumbnailPath;
    }

    
}
