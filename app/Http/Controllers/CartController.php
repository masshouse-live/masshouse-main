<?php

namespace App\Http\Controllers;

use App\Mail\AdminOrderNotificationMail;
use App\Mail\OrderConfirmationMail;
use App\Models\Merchandise;
use App\Models\Order;
use App\Models\OrderTrend;
use App\Models\ProductOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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
        $productId = (int) $request->input('product_id');  // Cast to integer
        $cart = session()->get('cart', []);  // Initialize an empty cart if not set
        if (isset($cart[$productId])) {
            $cart[$productId]['quantity']++;
            session()->put('cart', $cart);  // Update the session with the modified cart
        }

        return response()->json([
            'cart' => $cart,
            'subtotal' => $this->getCartSubtotal($cart)
        ]);
    }

    public function decrementQuantity(Request $request)
    {
        $productId = (int) $request->input('product_id');  // Cast to integer
        $cart = session()->get('cart', []);  // Initialize an empty cart if not set

        if (isset($cart[$productId]) && intval($cart[$productId]['quantity']) > 1) {
            $cart[$productId]['quantity']--;
            session()->put('cart', $cart);  // Update session with the modified cart
        }

        return response()->json([
            'cart' => $cart,
            'subtotal' => $this->getCartSubtotal($cart)
        ]);
    }

    // color change
    public function changeColor(Request $request)
    {
        $color = $request->input('color');
        $productId = $request->input('product_id');
        $cart = session()->get('cart', []);
        $cart[$productId]['color'] = $color;
        session()->put('cart', $cart);
        return response()->json(['cart' => $cart]);
    }

    // size change
    public function changeSize(Request $request)
    {
        $size = $request->input('size');
        $productId = $request->input('product_id');
        $cart = session()->get('cart', []);
        $cart[$productId]['size'] = $size;
        session()->put('cart', $cart);
        return response()->json(['cart' => $cart]);
    }

    public function create_order(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zip' => 'required',
        ]);

        // Retrieve the cart from the session
        $cart = session()->get('cart', []);  // Default to empty array if cart is not set

        if (empty($cart)) {
            return redirect()->back()->with('error', 'Your cart is empty.');
        }

        // Create the order
        $order = new Order();
        $order->name = $request->name;
        $order->email = $request->email;
        $order->phone = $request->phone;
        $order->address = $request->address;
        $order->city = $request->city;
        $order->state = $request->state;
        $order->zip = $request->zip;
        $order->status = "order_placed";
        $order->users_events = $request->name . " - placed an order";
        $order->order_id = $this->getNextOrderNumber();
        $order->total = 0;
        $order->save();

        $total = 0;
        $productOrders = []; // Array to hold ProductOrder instances for the pivot

        foreach ($cart as $cartItem) {
            // Fetch the merchandise from the database
            $merchandise = Merchandise::find($cartItem['id']);
            if (!$merchandise) {
                continue;  // Skip if merchandise is not found
            }

            // Create a new ProductOrder
            $product_order = new ProductOrder();
            $product_order->order_id = $order->id;
            $product_order->merchandise_id = $cartItem['id'];
            $product_order->quantity = $cartItem['quantity'];
            $product_order->price = $merchandise->price;
            $product_order->color = $cartItem['color'] ?? "";
            $product_order->size = $cartItem['size'] ?? "";
            $product_order->save();

            // Add to the total
            $total += $product_order->price * $product_order->quantity;

            // Prepare the product order for attaching
            $productOrders[] = $product_order->id; // Store the product order ID
        }

        // Attach the product orders to the order
        $order->product_orders()->attach($productOrders);

        // Update the order total
        $order->total = $total;
        $order->save();

        // Update the order trend for today
        $order_trend = OrderTrend::firstOrCreate(
            ['date' => date('Y-m-d')],
            ['total_orders' => 0, 'total_revenue' => 0]
        );
        $order_trend->increment('total_orders');
        $order_trend->increment('total_revenue', $total);

        // Send email to the customer
        Mail::to($request->email)->send(new OrderConfirmationMail($order));

        // Send email to the admin
        Mail::to(env('ADMIN_EMAIL'))->send(new AdminOrderNotificationMail($order));

        // Clear the cart session after placing the order
        session()->forget('cart');

        return redirect(route('orders_placed', ['order_id' => $order->id]));
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
