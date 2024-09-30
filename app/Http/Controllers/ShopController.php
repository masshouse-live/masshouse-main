<?php

namespace App\Http\Controllers;

use App\Models\Sponsor;
use App\Models\Merchandise;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        $partners = Sponsor::all();
        $alpha_merch = ProductCategory::where('type', 'alpha')->get();
        $categories = ProductCategory::where('type', null)->get();
        $higligted_category = ProductCategory::where('highlight', true)->get()->first();
        return view('shop.index', compact('partners', 'alpha_merch', 'categories', "higligted_category"));
    }
}
