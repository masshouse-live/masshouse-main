<?php

namespace App\Http\Controllers;

use App\Models\Sponsor;
use App\Models\News;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    // should have search param for category filter

    public function news(Request $request)
    {
        $categ = $request->input('category');
        // if category not found show all
        $news = News::where('category', $categ)->get();
        if (count($news) == 0) {
            $news = News::all();
        }
        $sponsors = Sponsor::all();

        $trending = News::orderBy('views', 'desc')->take(9)->get();
        $blogs = News::where('category', 'blogs')->orderBy('created_at', 'desc')->take(3)->get();
        return view('news', compact('news', "trending", "blogs", "sponsors"));
    }
}
