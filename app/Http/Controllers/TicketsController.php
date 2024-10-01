<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Sponsor;
use Illuminate\Http\Request;

class TicketsController extends Controller
{
    public function index(Request $request)
    { {
            $evets_filter  = $request->events ?? '';
            $events = Event::with("venue");
            if ($evets_filter) {
                $events->where('tag', $evets_filter);
            }
            $events = $events->whereDate('date_time', '>=', date('Y-m-d'))->orderBy('date_time', 'asc')->get();
            $sponsors = Sponsor::all()->take(6);
            $coming_events = Event::whereDate('date_time', '>=', date('Y-m-d'))->orderBy('date_time', 'asc')->take(2)->get();

            return view('tickets', compact("events", "sponsors", "coming_events"));
        }
    }
}
