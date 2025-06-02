<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function list()
    {
        // Example: Fetch all products from the database
        $products = \App\Models\Product::all();
        return view('page.products.list', ['products' => $products]);
    }

    public function addToCart(Request $request)
    {
        $productId = $request->input('product_id');
        $quantity = $request->input('quantity', 1);

        // Example: Add product to cart (session-based)
        $cart = session()->get('cart', []);
        if (isset($cart[$productId])) {
            $cart[$productId] += $quantity;
        } else {
            $cart[$productId] = $quantity;
        }
        session(['cart' => $cart]);

        return response()->json(['message' => 'Product added to cart', 'cart' => $cart]);
    }
}
