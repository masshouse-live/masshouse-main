<?php

namespace App\Http\Controllers;

use App\Models\Merchandise;
use App\Models\Order;
use App\Models\ProductOrder;

use Illuminate\Http\Request;

class ProductOrderController extends Controller
{
    //
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
            'products' => 'required|array', // Validate that products is an array
        ]);

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

        foreach ($request->products as $product) {
            $merchandise = Merchandise::find($product['product_id']);
            $product_order = new ProductOrder();
            $product_order->order_id = $order->id;
            $product_order->merchandise_id = $product['product_id'];
            $product_order->quantity = $product['quantity'];
            $product_order->price = $merchandise->price;
            $product_order->color = $product['color'];
            $product_order->size = $product['size'];
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

        // Redirect to order placed page
        return redirect(route('orders_placed', ['order_id' => $order->id]));
    }



    public function orders_placed()
    {
        return view('orders-placed',);
    }
}
