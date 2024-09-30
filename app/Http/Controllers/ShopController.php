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

    public function merchandise(Request $request)
    {
        // if category slug
        $category_slug = $request->category;
        $category = null;
        if (!empty($category_slug)) {
            $category = ProductCategory::where('slug', $category_slug)->first();
        }

        $merchandise = Merchandise::query()
            ->when($category, function ($query) use ($category) {
                return $query->where('product_category_id', $category->id);
            })
            ->paginate(20);
        $partners = Sponsor::all();
        $top_categories = ProductCategory::get()->take(3);
        return view('shop.merch', compact('merchandise', "partners", "top_categories"));
    }
}
