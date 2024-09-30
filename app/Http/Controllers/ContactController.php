<?php

namespace App\Http\Controllers;

use App\Models\Sponsor;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $sponsors = Sponsor::all();

        return view('contact', compact('sponsors'));
    }
}
