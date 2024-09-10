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
        $events = Event::whereDate('date_time', '>=', date('Y-m-d'))->orderBy('date_time', 'asc')->take(8)->get();
        $sponsors = Sponsor::all()->take(6);
        $team_members = TeamMember::all();
        $professionals = Professional::all();
        return view('about', compact("events", "sponsors", "team_members", "professionals"));
    }
}
