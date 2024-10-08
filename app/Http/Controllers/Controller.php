<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Datetime;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function upload_image($file, $path, $filename)
    {
        $timestamp = new Datetime();
        $new_timestamp = $timestamp->format('Y-m-d_H-i-s');
        $image_main_temp = $new_timestamp . $filename;
        $image_main_temp = str_replace(' ', '', $image_main_temp);
        $image = str_replace('&', '', $image_main_temp);


        $file->move($path, $image);

        $public_url = $path . '/' . $image;

        return $public_url;
    }

    public function getNextOrderNumber()
    {
        // Get the last created order
        $lastOrder = Order::orderBy('created_at', 'desc')->first();

        if (! $lastOrder)
            // We get here if there is no order at all
            // If there is no number set it to 0, which will be 1 at the end.

            $number = 0;
        else
            $number = substr($lastOrder->order_id, 3);

        // If we have ORD000001 in the database then we only want the number
        // So the substr returns this 000001

        // Add the string in front and higher up the number.
        // the %05d part makes sure that there are always 6 numbers in the string.
        // so it adds the missing zero's when needed.

        return 'ORD' . sprintf('%06d', intval($number) + 1);
    }
}
