<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Event;
use App\Models\Professional;
use App\Models\Playlist;
use App\Models\Sponsor;
use App\Models\News;
use App\Models\Merchandise;
use App\Models\SiteSttings;
use App\Models\Contact;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function users_list(Request $request)
    {
        $search = $request->search ?? '';
        $active = $request->active ?? ''; // 1 or 0 return all users if active is not set
        $order_by = $request->order_by ?? 'id desc';
        $from_date = $request->from_date ?? '';
        $to_date = $request->to_date ?? '';

        $users = User::where('name', 'like', '%' . $search . '%')
            // return all users if active is not set
            // ->where('is_active', $active)
            // ->orderBy($order_by)
            // ->whereBetween('created_at', [$from_date, $to_date])
            ->paginate(10);

        return view('admin.users', compact('users'));
    }

    public function user_detail($id)
    {
        $user = User::find($id);

        return view('admin.user_details', compact('user'));
    }
    public function events_list(Request $request)
    {

        $search = $request->search ?? '';
        $from_date = $request->from_date ?? '';
        $to_date = $request->to_date ?? '';
        $order_by = $request->order_by ?? 'id desc';
        // title, subtitle filter
        $events = Event::where('title', 'like', '%' . $search . '%')
            ->where('subtitle', 'like', '%' . $search . '%')
            ->whereBetween('date_time', [$from_date, $to_date])
            ->orderBy($order_by)
            ->paginate(10);

        return view('admin.events', compact('events'));
    }

    public function team_list(Request $request)
    {

        $search = $request->search ?? '';

        $team = User::where('name', 'like', '%' . $search . '%')
            ->orderBy('rank', 'desc')
            ->paginate(10);

        return view('admin.team', compact('team'));
    }

    public function professionals_list(Request $request)
    {

        $search = $request->search ?? '';
        $role = $request->search ?? '';

        $order_by = $request->order_by ?? 'id desc';

        $from_date = $request->from_date ?? '';
        $to_date = $request->to_date ?? '';

        $professionals = Professional::where('name', 'like', '%' . $search . '%')
            ->where('role', 'like', '%' . $role . '%')
            ->whereBetween('created_at', [$from_date, $to_date])
            ->orderBy($order_by)
            ->paginate(10);

        return view('admin.professionals', compact('professionals'));
    }

    public function playlist()
    {
        $search = $request->search ?? '';
        $from_date = $request->from_date ?? '';
        $to_date = $request->to_date ?? '';
        $playlist = Playlist::where('title', 'like', '%' . $search . '%')
            ->whereBetween('created_at', [$from_date, $to_date])
            ->paginate(10);


        return view('admin.playlist', compact('playlist'));
    }

    public function sponsors(Request $request)
    {
        $sponsors = Sponsor::all();
        return view('admin.sponsors', compact('sponsors'));
    }

    public function news_list(Request $request)
    {

        $search = $request->search ?? '';
        $from_date = $request->from_date ?? '';
        $to_date = $request->to_date ?? '';
        // search title, short description, description
        $news = News::where('title', 'like', '%' . $search . '%')
            ->orWhere('short_description', 'like', '%' . $search . '%')
            ->orWhere('description', 'like', '%' . $search . '%')
            ->whereBetween('created_at', [$from_date, $to_date])
            ->paginate(10);

        return view('admin.news', compact('news'));
    }

    public function merchandise(Request $request)
    {
        $search = $request->search ?? '';
        $category = $request->category ?? '';
        $gender = $request->gender ?? '';
        $size = $request->sizes ?? '';
        $color = $request->colors ?? '';
        $merchandise = Merchandise::where('name', 'like', '%' . $search . '%')
            ->where('category', 'like', '%' . $category . '%')
            ->where('gender', 'like', '%' . $gender . '%')
            ->where('sizes', 'like', '%' . $size . '%')
            ->where('colors', 'like', '%' . $color . '%')
            ->paginate(10);
        return view('admin.merchandise', compact('merchandise'));
    }

    public function messages(Request $request)
    {
        $search = $request->search ?? '';
        $category  = $request->category ?? '';

        $contacts =  Contact::where('name', 'like', '%' . $search . '%')
            ->where('category', 'like', '%' . $category . '%')
            ->paginate(10);

        return view('admin.contact', compact('contacts'));
    }

    public function settings()
    {
        $settings = SiteSttings::find(1);
        return view('admin.settings');
    }

    public function privacy_policy()
    {
        return view('admin.privacy-policy');
    }
    public function terms_and_conditions()
    {
        return view('admin.terms-and-conditions');
    }
    public function delivery_policy()
    {
        return view('admin.delivery-policy');
    }
    public function return_policy()
    {
        return view('admin.return-policy');
    }
}
