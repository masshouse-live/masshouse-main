<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Playlist;
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
    public function index()
    {
        $events = Event::whereDate('date_time', '>=', date('Y-m-d'))->take(8)->get();
        $sponsors = Sponsor::all();
        $coming_event = Event::whereDate('date_time', '>=', date('Y-m-d'))->orderBy('date_time', 'asc')->first();
        $playlist = Playlist::orderBy('created_at', 'desc')->take(6)->get();
        return view('home', compact("events", "coming_event", "sponsors", "playlist"));
    }
}
