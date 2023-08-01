<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

use Cart;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        // Get query parameter for filter
        $filter = $request->query('filter');

        // Query products with filter, if provided
        $query = Product::query();

        if ($filter) {
            $query->where('name', 'like', '%' . $filter . '%')
                  ->orWhere('description', 'like', '%' . $filter . '%');
        }

        // Paginate the products and use the `simplePaginate` method instead of `paginate`
        $products = $query->simplePaginate(6); // Show 6 products per page

        return view('products.index', compact('products'));
    }

    // public function add_to_cart(Product $product)
    // {
    //     Cart::add([
    //         'id' => $product->id,
    //         'name' => $product->name,
    //         'price' => $product->price,
    //         'image' => $product->image,
    //         'quantity' => 1,
    //         'attributes' => [], // Additional attributes if needed
    //         'associatedModel' => $product, // Associate the product model with the cart item
    //     ]);

    //     return redirect()->route('products.index')->with('success', 'Product added to cart successfully!');
    // }

    public function show($id)
    {
        $product = Product::where('id',$id)->first();
        return view('products.show', compact('product'));
    }
}
