<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Sponsor;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function about()
    {
        $events = Event::whereDate('date_time', '>=', date('Y-m-d'))->orderBy('date_time', 'asc')->take(8)->get();
        $sponsors = Sponsor::all();
        $coming_event = Event::whereDate('date_time', '>=', date('Y-m-d'))->orderBy('date_time', 'asc')->first();
        return view('home', compact("events", "coming_event", "sponsors"));
    }
}
