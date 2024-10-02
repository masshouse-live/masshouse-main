<?php

namespace App\Http\Controllers;

use App\Models\Merchandise;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        $cart = session()->get('cart', []);

        $product_id = $request->input('product_id');
        $quantity = $request->input('quantity', 1);

        if (isset($cart[$product_id])) {
            $cart[$product_id]['quantity'] += $quantity;
        } else {
            $product = Merchandise::find($product_id);

            $cart[$product_id] = [
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => $quantity,
                'image' => $product->image,
            ];
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart!');
    }

    public function viewCart()
    {
        $cart = session()->get('cart', []);
        return view('checkout', compact('cart'));
    }

    public function removeFromCart($id)
    {
        $cart = session()->get('cart');

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()->back()->with('success', 'Product removed from cart');
    }

    public function incrementQuantity(Request $request)
    {
        $productId = $request->input('product_id');
        $cart = session()->get('cart');

        if (isset($cart[$productId])) {
            $cart[$productId]['quantity']++;
            session()->put('cart', $cart);
        }

        return response()->json([
            'cart' => $cart,
            'subtotal' => $this->getCartSubtotal($cart)
        ]);
    }

    public function decrementQuantity(Request $request)
    {
        $productId = $request->input('product_id');
        $cart = session()->get('cart');

        if (isset($cart[$productId]) && $cart[$productId]['quantity'] > 1) {
            $cart[$productId]['quantity']--;
            session()->put('cart', $cart);
        }

        return response()->json([
            'cart' => $cart,
            'subtotal' => $this->getCartSubtotal($cart)
        ]);
    }

    private function getCartSubtotal($cart)
    {
        $subtotal = 0;
        foreach ($cart as $item) {
            $subtotal += $item['price'] * $item['quantity'];
        }
        return $subtotal;
    }
}
