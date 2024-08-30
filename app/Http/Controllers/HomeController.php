<?php

namespace App\Http\Controllers;

use App\Models\Event;

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
        $coming_event = Event::whereDate('date_time', '>=', date('Y-m-d'))->orderBy('date_time', 'asc')->first();
        return view('home', compact("events", "coming_event"));
    }
}
