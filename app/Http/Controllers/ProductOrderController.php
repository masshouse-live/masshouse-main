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

    public function orders_placed()
    {
        return view('orders-placed',);
    }
}
