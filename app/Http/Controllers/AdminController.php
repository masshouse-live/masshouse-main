<?php

namespace App\Http\Controllers;

use App\Models\User;

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

        $users = User::where('name', 'like', '%' . $search . '%')
            ->where('is_active', $active)
            ->orderBy($order_by)
            ->paginate(10, ['*'], 'page', $page);

        return view('admin.users', compact('users'));
    }

    public function user_detail($id)
    {
        $user = User::find($id);

        return view('admin.user_details', compact('user'));
    }
}
