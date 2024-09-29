<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Sponsor;
use App\Models\TeamMember;
use App\Models\Professional;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function about()
    {
        $evets_filter  = $request->events ?? '';
        $events = Event::with("venue");
        if ($evets_filter) {
            $events->where('tag', $evets_filter);
        }
        $events = $events->whereDate('date_time', '>=', date('Y-m-d'))->orderBy('date_time', 'asc')->get();
        $sponsors = Sponsor::all()->take(6);
        $team_members = TeamMember::all();
        $professionals = Professional::all();
        return view('about', compact("events", "sponsors", "team_members", "professionals"));
    }
}
