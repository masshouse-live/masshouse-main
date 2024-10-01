<?php

namespace App\Http\Controllers;

use App\Models\Merchandise;
use App\Models\Order;
use App\Models\ProductOrder;
use App\Models\OrderTrend;
use App\Mail\OrderConfirmationMail;
use App\Mail\AdminOrderNotificationMail;
use Illuminate\Support\Facades\Mail;
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

        // get trend for today
        $order_trend = OrderTrend::where('date', date('Y-m-d'))->first();
        if (!$order_trend) {
            $order_trend = new OrderTrend();
            $order_trend->date = date('Y-m-d');
            $order_trend->total_orders = 0;
            $order_trend->total_revenue = 0;
        }
        $order_trend->total_orders = $order_trend->total_orders + 1;
        $order_trend->total_revenue = $order_trend->total_revenue + $total;
        $order_trend->save();

        // send email
        Mail::to($request->email)->send(new OrderConfirmationMail($order));

        // send email to admin (you can replace 'admin@example.com' with the actual admin email)
        Mail::to(env('ADMIN_EMAIL'))->send(new AdminOrderNotificationMail($order));

        return redirect(route('orders_placed', ['order_id' => $order->id]));
    }



    public function orders_placed()
    {
        return view('orders-placed',);
    }
}
