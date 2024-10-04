<?php

namespace App\Http\Controllers;

use App\Models\Sponsor;
use App\Models\News;
use App\Models\Event;
use App\Models\Playlist;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    // should have search param for category filter

    public function news(Request $request)
    {
        $events_filter = $request->input('events');
        $news_filter = $request->input('news');
        $news = News::query();
        if ($news_filter) {
            $news = $news->where('category', $news_filter)->take(4)->get();
        } else {
            $news = $news->where('category', '!=', 'blog')->take(4)->get();
        }

        $sponsors = Sponsor::all();
        $events = Event::with("venue");
        if ($events_filter) {
            $events->where('tag', $events_filter);
        }
        $events = $events->whereDate('date_time', '>=', date('Y-m-d'))->orderBy('date_time', 'asc')->take(4)->get();
        // latest 10 top 3
        $latestNews = News::latest()->take(10)->get();
        $playlist = Playlist::orderBy('created_at', 'desc')->first();

        $trending = $latestNews->sortByDesc('views')->take(3);
        $blogs = News::where('category', 'blog')->orderBy('created_at', 'desc')->take(3)->get();
        return view('news', compact('news',"playlist", "trending", "blogs", "sponsors", "events"));
    }

    public function news_detail(Request $request)
    {
        $slug = $request->slug;
        $news = News::where('slug', $slug)->first();

        // Check if the article has already been viewed in this session
        $viewedNews = session()->get('viewed_news', []);

        if (!in_array($slug, $viewedNews)) {
            // Increment views if the article has not been viewed
            $news->increment('views');

            // Add the article ID to the session to track it as viewed
            session()->push('viewed_news', $slug);
        }

        $sponsors = Sponsor::all();
        $events = Event::with("venue")
            ->whereDate('date_time', '>=', date('Y-m-d'))
            ->orderBy('date_time', 'asc')
            ->take(4)
            ->get();

        $related_news = News::where('category', $news->category)->where('id', '!=', $news->id)->get();

        return view('news-details', compact('news', "sponsors", "events", "related_news"));
    }
}
