<?php

namespace App\Http\Controllers;

use App\Models\Event;

use Illuminate\Http\Request;

class EventController extends Controller
{
    function events()
    {
        $events = Event::all();
        return view('events', compact("events"));
    }
}
