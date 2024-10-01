<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Playlist;
use App\Models\ProductCategory;
use App\Models\NewsletterSubscription;
use App\Models\SiteSttings;
use App\Models\Sponsor;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
    //  * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $evets_filter  = $request->events ?? '';
        $events = Event::with("venue");
        if ($evets_filter) {
            $events->where('tag', $evets_filter);
        }
        $events = $events->whereDate('date_time', '>=', date('Y-m-d'))->orderBy('date_time', 'asc')->get();
        $sponsors = Sponsor::all();
        $coming_event = Event::whereDate('date_time', '>=', date('Y-m-d'))->orderBy('date_time', 'asc')->first();
        $playlist = Playlist::orderBy('created_at', 'desc')->take(6)->get();
        $merchandise_categories = ProductCategory::query();
        $merchandise_categories = $merchandise_categories->orderBy('id', 'desc')->paginate(10);
        return view('home', compact("events", "coming_event", "sponsors", "playlist", "merchandise_categories"));
    }

    public function menu()
    {
        $settings =  SiteSttings::select('menu_path')->where('id', 1)->first();
        $menu = $settings->menu_path;
        return view('menu', compact('menu'));
    }

    // subscribe to newsletter
    public function subscribe_newsletter(Request $request)
    {
        try {
            $request->validate([
                'email' => 'required|email',
            ]);

            $input = $request->all();
            $input['subscribed'] = 1;
            NewsletterSubscription::create($input);

            return redirect()->back();
        } catch (\Exception $e) {
            dd($e);
        }
    }
}
