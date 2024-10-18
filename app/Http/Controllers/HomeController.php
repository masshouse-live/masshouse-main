<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Playlist;
use App\Models\ProductCategory;
use App\Models\NewsletterSubscription;
use App\Models\SiteSttings;
use App\Models\Sponsor;
use Spatie\Newsletter\Facades\Newsletter;

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

        $events = $events->whereDate('date_time', '>=', date('Y-m-d'))
            ->orderBy('date_time', 'asc')
            ->get();

        $sponsors = Sponsor::all();

        // Fetch the coming event, including today
        $coming_event = Event::where('date_time', '>=', now()) // Using 'now()' to include today's events
            ->orderBy('date_time', 'asc')
            ->first();

        $playlist = Playlist::orderBy('created_at', 'desc')->first();

        $merchandise_categories = ProductCategory::orderBy('id', 'desc')->paginate(10);

        return view('home', compact("events", "coming_event", "sponsors", "playlist", "merchandise_categories"));
    }

    public function menu()
    {
        $settings =  SiteSttings::select('menu_path')->where('id', 1)->first();
        $menu = $settings->menu_path;
        return view('menu', compact('menu'));
    }
    public function subscribe_newsletter(Request $request)
    {
        try {
            $request->validate([
                'email' => 'required|email',
            ]);

            // if emails are already subscribed
            if (NewsletterSubscription::where('email', $request->email)->exists()) {
                return redirect()->back();
            }

            $input = $request->all();
            $input['subscribed'] = 1;
            NewsletterSubscription::create($input);
            Newsletter::subscribe($input['email']);

            return redirect()->back();
        } catch (\Exception $e) {
            dd($e);
        }
    }
}
