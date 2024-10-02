<?php

namespace App\Http\Controllers;

use App\Models\Merchandise;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        $cart = session()->get('cart', []);

        $productId = $request->input('product_id');
        $size = $request->input('size');
        $color = $request->input('color');

        // Check if the product is already in the cart
        if (isset($cart[$productId])) {
            // Update quantity or any other logic you want
            $cart[$productId]['quantity'] += 1;
        } else {
            $product = Merchandise::find($productId);
            // Add product to cart
            $cart[$productId] = [
                'name' => $product->name,
                "id" => $product->id,
                'price' => $product->price,
                'quantity' => 1,
                'size' => $size,
                'color' => $color,
                "sizes" => $product->sizes,
                "colors" => $product->colors,
                'image' => $product->image
            ];
        }

        // Save updated cart to session
        session()->put('cart', $cart);

        return response()->json(['success' => true, 'message' => 'Product added to cart']);
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
