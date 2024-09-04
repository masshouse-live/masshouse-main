<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Event;
use App\Models\Professional;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function users_list(Request $request)
    {
        $page = $request->page ?? 1;
        $search = $request->search ?? '';
        $active = $request->active ?? ''; // 1 or 0
        $order_by = $request->order_by ?? 'id desc';
        $from_date = $request->from_date ?? '';
        $to_date = $request->to_date ?? '';

        $users = User::where('name', 'like', '%' . $search . '%')
            ->where('is_active', $active)
            ->orderBy($order_by)
            ->whereBetween('created_at', [$from_date, $to_date])
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

        $page = $request->page ?? 1;
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

        $page = $request->page ?? 1;
        $search = $request->search ?? '';

        $team = User::where('name', 'like', '%' . $search . '%')
            ->orderBy('rank', 'desc')
            ->paginate(10);

        return view('admin.team', compact('team'));
    }

    public function professionals_list(Request $request)
    {

        $page = $request->page ?? 1;
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
}
