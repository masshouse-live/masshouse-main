<?php

namespace App\Http\Controllers;

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
        $image_main_temp = $new_timestamp . 'image' . $filename;
        $image = str_replace(' ', '', $image_main_temp);
        $file->move($path, $image);

        $public_url = $path . '/' . $image;

        return $public_url;
    }
}
