<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Cart;

class CartController extends Controller
{
    public function addToCart(Product $product)
    {
        Cart::add([
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'image' => $product->image,
            'quantity' => 1,
            'attributes' => [],
        ]);
        
        return redirect()->back()->with('success', 'Product added to cart.');
    }

    public function viewCart()
    {
        $cartItems = Cart::getContent();

        return view('cart', compact('cartItems'));
    }

    public function checkout()
    {
        // Your checkout logic goes here
        // Implement payment gateway integration, order processing, etc.

        $cartItems = Cart::getContent(); // Get cart items

        return view('checkout.index', compact('cartItems'));
    }
}
