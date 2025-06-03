<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;

class ProductController extends Controller
{
    public function list()
    {
        // Example: Fetch all products from the database
        $products = Product::all();
        return view('page.products.list', ['products' => $products]);
    }

    public function addToCart(Request $request)
    {
        $encodedData = $request->input('data');
        if ($encodedData) {
            $decoded = base64_decode($encodedData, true);
            if ($decoded === false) {
                return response()->json(['error'=>true,'message'=>'General Error']);
            }
            $data = json_decode($decoded, true);
            if (!is_array($data)) {
                return response()->json(['error'=>true,'message'=>'General Error']);
            }
            $request->merge($data);
        }
        $productId = $request->input('product_id');
        $quantity = $request->input('quantity', 1);

        $userId = auth()->id();

        // Validate product exists
        $product = Product::find($productId);
        if (!$product) {
            return response()->json(['error'=>true,'message'=>'Produk Tidak ditemukan']);
        }

        // Find or create cart item
        $cart = Cart::firstOrCreate(
            ['user_id' => $userId, 'product_id' => $productId],
            ['qty' => 0]
        );

        // Update quantity
        $cart->qty += $quantity;
        $cart->save();

        return response()->json(['error'=>false,'message'=>'Produk Berhasil Ditambahkan Ke Keranjang']);
    }

    public function cartList()
    {
        $userId = auth()->id();
        $cartItems = Cart::with('product')->where('user_id', $userId)->get();
        return view('page.carts.list', ['cartItems' => $cartItems]);
    }
}
