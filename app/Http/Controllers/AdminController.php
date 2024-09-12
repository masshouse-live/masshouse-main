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
use App\Models\EventsVenue;
use App\Models\Order;
use App\Models\TeamMember;
use Datetime;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }
    public function users_list(Request $request)
    {
        $search = $request->search ?? '';
        $active = $request->active ?? ''; // 1 or 0
        $order_by = $request->order_by ?? '-id'; // Default to -id (desc)
        $from_date = $request->from_date ?? '';
        $to_date = $request->to_date ?? '';

        // Create the base query
        $users = User::query();

        // Apply search filter if provided
        if (!empty($search)) {
            $users->where('name', 'like', '%' . $search . '%');
        }

        // Apply active filter only if it's set (not an empty string)
        if ($active !== '') {
            $users->where('is_active', $active);
        }

        // Apply date range filter only if both from_date and to_date are provided
        if (!empty($from_date) && !empty($to_date)) {
            $users->whereBetween('created_at', [$from_date, $to_date]);
        }

        // Handle ordering: check for the minus sign
        if (substr($order_by, 0, 1) === '-') {
            $column = substr($order_by, 1); // Remove the minus sign to get the column name
            $direction = 'desc'; // Descending order
        } else {
            $column = $order_by;
            $direction = 'asc'; // Ascending order
        }

        // Apply ordering
        $users->orderBy($column, $direction);

        // Paginate results
        $users = $users->paginate(10);

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
        $order_by = $request->order_by ?? '-id'; // Default to '-id' for descending order

        // Create the base query
        $events = Event::query();

        // Apply search filters for both title and subtitle if search is provided
        if (!empty($search)) {
            $events->where(function ($query) use ($search) {
                $query->where('title', 'like', '%' . $search . '%')
                    ->orWhere('subtitle', 'like', '%' . $search . '%');
            });
        }

        // Apply date range filter only if both from_date and to_date are provided
        if (!empty($from_date) && !empty($to_date)) {
            $events->whereBetween('date_time', [$from_date, $to_date]);
        }

        // Handle ordering: check for the minus sign
        if (substr($order_by, 0, 1) === '-') {
            $column = substr($order_by, 1); // Remove the minus sign to get the column name
            $direction = 'desc'; // Descending order
        } else {
            $column = $order_by;
            $direction = 'asc'; // Ascending order
        }

        // Apply ordering
        $events->orderBy($column, $direction);

        // Paginate results
        $events = $events->paginate(10);
        $event_venues = EventsVenue::all();
        return view('/admin/events', compact('events', 'event_venues'));
    }

    public function event_detail($id)
    {
        $event = Event::find($id);

        return view('admin.event_details', compact('event'));
    }

    public function create_event(Request $request)
    {
        try {
            $request->validate([
                "title" => "required",
                "subtitle" => "required",
                "banner" => "required",
                "tickets_link" => "required",
                "event_venue" => "required",
                "event_date" => "required",
                "event_time" => "required",
                "tag" => "required",
            ]);


            // upload banner
            $banner = $this->upload_image($request->file('banner'), 'upload/events', str_replace(' ', '', $request->file('cover_photo')->getClientOriginalName()));

            $event = new Event();
            $event->title = $request->title;
            $event->subtitle = $request->subtitle;
            $event->tickets_link = $request->tickets_link;
            $event->events_venue_id = $request->event_venue;
            $event->banner = $banner;
            $event->date_time = $request->event_date . ' ' . $request->event_time;
            $event->tag = $request->tag;
            $event->save();

            return redirect(route('admin.events_list'))->with('success', 'Event created successfully');
        } catch (\Exception $e) {
            dd($e);
        }
    }


    public function edit_event(Request $request)
    {
        try {
            $request->validate([
                "id" => "required",
                "title" => "required",
                "subtitle" => "required",
                "tickets_link" => "required",
                "event_venue" => "required",
                "event_date" => "required",
                "event_time" => "required",
                "tag" => "required",
            ]);

            $event = Event::find($request->id);

            $banner = $event->banner;

            if ($request->hasFile('banner')) {
                $banner = $this->upload_image($request->file('banner'), 'upload/events', str_replace(' ', '', $request->file('cover_photo')->getClientOriginalName()));
            }


            $event->title = $request->title;
            $event->subtitle = $request->subtitle;
            $event->tickets_link = $request->tickets_link;
            $event->events_venue_id = $request->event_venue;
            $event->banner = $banner;
            $event->date_time = $request->event_date . ' ' . $request->event_time;
            $event->tag = $request->tag;
            $event->save();


            return redirect(route('admin.events_list'));
        } catch (\Exception $e) {
            dd($e);
        }
    }



    public function create_event_venue(Request $request)
    {
        try {

            $request->validate([
                'location' => 'required',
                'address' => 'required',
                'cover_photo' => 'required',
                'image1' => 'required',
                'image2' => 'required',
                'image3' => 'required',
                'image4' => 'required',
                'image5' => 'required',
            ]);

            // upload cover photo
            $cover_photo = $this->upload_image($request->file('cover_photo'), 'upload/event_venues', str_replace(' ', '', $request->file('cover_photo')->getClientOriginalName()));


            $event_venue = new EventsVenue();
            $event_venue->name = $request->location;
            $event_venue->address = $request->address;
            $event_venue->cover_photo = $cover_photo;
            $event_venue->save();

            // create venue images

            $image1 = $this->upload_image($request->file('image1'), 'upload/event_venues', str_replace(' ', '', $request->file('image1')->getClientOriginalName()));
            $image2 = $this->upload_image($request->file('image2'), 'upload/event_venues', str_replace(' ', '', $request->file('image2')->getClientOriginalName()));
            $image3 = $this->upload_image($request->file('image3'), 'upload/event_venues', str_replace(' ', '', $request->file('image3')->getClientOriginalName()));
            $image4 = $this->upload_image($request->file('image4'), 'upload/event_venues', str_replace(' ', '', $request->file('image4')->getClientOriginalName()));
            $image5 = $this->upload_image($request->file('image5'), 'upload/event_venues', str_replace(' ', '', $request->file('image5')->getClientOriginalName()));

            $event_venue->images()->createMany([
                ['image' => $image1, 'event_venue_id' => $event_venue->id, 'index' => 1, "alt" => "Image 1"],
                ['image' => $image2, 'event_venue_id' => $event_venue->id, 'index' => 2, "alt" => "Image 2"],
                ['image' => $image3, 'event_venue_id' => $event_venue->id, 'index' => 3, "alt" => "Image 3"],
                ['image' => $image4, 'event_venue_id' => $event_venue->id, 'index' => 4, "alt" => "Image 4"],
                ['image' => $image5, 'event_venue_id' => $event_venue->id, 'index' => 5, "alt" => "Image 5"],
            ]);


            return redirect(route('admin.events_list'));
        } catch (\Illuminate\Validation\ValidationException $e) {
            dd($e->errors());
        }
    }


    public function team_list(Request $request)
    {
        $search = $request->search ?? '';

        $query = TeamMember::query();

        if ($search) {
            $query->where('name', 'like', '%' . $search . '%');
        }

        $team = $query->orderBy('rank', 'desc')->paginate(10);

        return view('admin.team', compact('team'));
    }

    public function add_member(Request $request)
    {


        $request->validate([
            'name' => 'required',
            'title' => 'required',
            'image' => 'required',
        ]);


        $image = $this->upload_image($request->file('image'), 'upload/team', str_replace(' ', '', $request->file('image')->getClientOriginalName()));


        $team = new TeamMember();
        $team->name = $request->name;
        $team->title = $request->title;
        $team->image = $image;
        // RANK IS LEnGTH OF TEAM
        $team->rank = TeamMember::all()->count() + 1;
        $team->save();


        return redirect(route('admin.team_list'));
    }



    public function edit_member(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',
                'title' => 'required',
                'id' => 'required',
            ]);

            $member = TeamMember::find($request->id);

            $image = $member->image;

            if ($request->hasFile('image')) {
                $image = $this->upload_image($request->file('image'), 'upload/team', str_replace(' ', '', $request->file('image')->getClientOriginalName()));
            }


            $member->name = $request->name;
            $member->title = $request->title;
            $member->image = $image;
            $member->save();


            return redirect(route('admin.team_list'));
        } catch (\Illuminate\Validation\ValidationException $e) {
            dd($e->errors());
        }
    }


    public function professionals_list(Request $request)
    {

        $search = $request->search ?? '';
        $role = $request->search ?? '';

        $order_by = $request->order_by ?? 'id desc';

        $from_date = $request->from_date ?? '';
        $to_date = $request->to_date ?? '';

        $professionals = Professional::where('name', 'like', '%' . $search . '%')
            // ->where('role', 'like', '%' . $role . '%')
            // ->whereBetween('created_at', [$from_date, $to_date])
            // ->orderBy($order_by)
            ->paginate(10);

        return view('admin.professionals', compact('professionals'));
    }

    public function add_professional(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'role' => 'required',
            'image' => 'required',
            'description' => 'required',
        ]);

        $image = $this->upload_image($request->file('image'), 'upload/professionals', str_replace(' ', '', $request->file('image')->getClientOriginalName()));

        $professional = new Professional();
        $professional->name = $request->name;
        $professional->role = $request->role;
        $professional->image = $image;
        $professional->description = $request->description;

        $professional->save();

        return redirect(route('admin.professionals_list'));
    }



    public function edit_professional(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'role' => 'required',
            'description' => 'required',
            'id' => 'required',
        ]);

        $professional = Professional::find($request->id);
        $image = $professional->image;

        if ($request->hasFile('image')) {
            $image = $this->upload_image($request->file('image'), 'upload/professionals', str_replace(' ', '', $request->file('image')->getClientOriginalName()));
        }
        $professional->name = $request->name;
        $professional->role = $request->role;
        $professional->image = $image;
        $professional->description = $request->description;
        $professional->save();


        return redirect(route('admin.professionals_list'));
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

    public function add_media(Request $request)
    {


        $request->validate([
            'title' => 'required',
            'image' => 'required',
            "spotify_link" => "required",
            "youtube_link" => "required",
            "souncloud_link" => "required",
            "applemusic_link" => "required",
        ]);


        $image = $this->upload_image($request->file('image'), 'upload/playlist', str_replace(' ', '', $request->file('image')->getClientOriginalName()));


        $playlist = new Playlist();


        $playlist->title = $request->title;
        $playlist->image = $image;
        $playlist->spotify_link = $request->spotify_link;
        $playlist->youtube_link = $request->youtube_link;
        $playlist->souncloud_link = $request->souncloud_link;
        $playlist->applemusic_link = $request->applemusic_link;


        $playlist->save();

        return redirect(route('admin.playlist'));
    }

    public function sponsors(Request $request)
    {
        // order by rank
        $sponsors = Sponsor::orderBy('rank', 'asc')->paginate(10);
        return view('admin.sponsors', compact('sponsors'));
    }

    public function update_sponsor_rank(Request $request)
    {
        // Validate the request inputs
        $request->validate([
            'sponsor_id' => 'required|integer|exists:sponsors,id',
            'rank' => 'required|integer|min:1',  // new rank that the sponsor should have
            'from_index' => 'required|integer|min:1', // previous rank of the sponsor
        ]);

        DB::beginTransaction();

        try {
            // Get the sponsor to be updated
            $sponsor = Sponsor::findOrFail($request->sponsor_id);

            $currentRank = $request->from_index;  // rank from the request (old rank)
            $newRank = $request->rank;  // desired new rank

            // If the rank is being changed
            if ($currentRank !== $newRank) {
                if ($newRank > $currentRank) {
                    // Moving down the ranks, increment rank of sponsors between currentRank and newRank
                    Sponsor::whereBetween('rank', [$currentRank + 1, $newRank])
                        ->decrement('rank');  // Push down other sponsors
                } else {
                    // Moving up the ranks, decrement rank of sponsors between newRank and currentRank
                    Sponsor::whereBetween('rank', [$newRank, $currentRank - 1])
                        ->increment('rank');  // Push up other sponsors
                }

                // Update the rank of the sponsor to the new rank
                $sponsor->rank = $newRank;
                $sponsor->save();
            }

            // Ensure ranks are consecutive (optional if needed)
            $sponsors = Sponsor::orderBy('rank')->get();
            $rank = 1;
            foreach ($sponsors as $s) {
                if ($s->rank != $rank) {
                    $s->update(['rank' => $rank]);
                }
                $rank++;
            }

            DB::commit();
            return response()->json(['status' => 'success']);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['status' => 'error', 'message' => $e->getMessage()], 500);
        }
    }



    public function add_sponsor(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'logo' => 'required',
            'url' => 'required',
        ]);


        $image = $this->upload_image($request->file('logo'), 'upload/sponsors', str_replace(' ', '', $request->file('logo')->getClientOriginalName()));


        $sponsor = new Sponsor();


        $sponsor->name = $request->name;
        $sponsor->logo = $image;
        $sponsor->url = $request->url;
        // rank is length of sponsors
        $sponsor->rank = Sponsor::all()->count() + 1;


        $sponsor->save();


        return redirect(route('admin.sponsors'));
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

    public function add_news(Request $request)
    {


        $request->validate([
            'title' => 'required',
            'category' => 'required',
            'description' => 'required',
            'image' => 'required',
        ]);


        $image = $this->upload_image($request->file('image'), 'upload/news', str_replace(' ', '', $request->file('image')->getClientOriginalName()));
        // remove html tags and get the first 50 words
        $short_description  = strip_tags($request->description);
        $short_description = substr($short_description, 0, 50);
        $news = new News();
        $news->title = $request->title;
        $news->category = $request->category;
        $news->short_description = $short_description;
        $news->description = $request->description;
        // created_by is the id of the logged in user
        $news->created_by = Auth::user()->name;
        $news->views = 0;
        $news->image = $image;

        $news->save();
        return redirect(route('admin.news'));
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

    public function merch_orders(Request $request)
    {
        $merch_orders = Order::orderBy('id', 'desc')->paginate(10);
        return view('admin.merch-orders', compact("merch_orders"));
    }

    public function add_product(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'gender' => 'required',
            'sizes' => 'required',
            'colors' => 'required',
            'description' => 'required',
            'price' => 'required',
            'image' => 'required',
            'stock' => 'required',
            'category' => 'required',
        ]);


        $image = $this->upload_image($request->file('image'), 'upload/merchandise', str_replace(' ', '', $request->file('image')->getClientOriginalName()));


        $merchandise = new Merchandise();


        $merchandise->name = $request->name;
        $merchandise->gender = $request->gender;
        $merchandise->sizes = $request->sizes;
        $merchandise->colors = $request->colors;
        $merchandise->description = $request->description;
        $merchandise->price = $request->price;
        $merchandise->image = $image;
        $merchandise->stock = $request->stock ?? 0;
        $merchandise->category = $request->category ?? "merchandise";


        $merchandise->save();

        // CREATE images could be in image[1-5]
        for ($i = 1; $i <= 5; $i++) {
            if ($request->hasFile('image' . $i)) {  // Check if the file exists
                $image = $this->upload_image(
                    $request->file('image' . $i),
                    'upload/merchandise',
                    str_replace(' ', '', $request->file('image' . $i)->getClientOriginalName())
                );

                $merchandise->images()->create([
                    'image' => $image,
                    "merchandise_id" => $merchandise->id
                ]);
            }
        }

        return redirect(route('admin.merchandise'));
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
        $settings =  SiteSttings::select('name', 'logo', 'contact_email', 'contact_phone', 'contact_address', 'menu_path')->where('id', 1)->get();
        // get only the first record
        // if length is 0, return null
        $settings = $settings->first();
        return view('admin.settings', compact('settings'));
    }

    public function update_settings(Request $request)
    {
        // upload upload_max_filesize in .ini


        $request->validate([
            'name' => 'required',
            'contact_email' => 'required',
            'contact_phone' => 'required',
            'contact_address' => 'required',
        ]);

        $settings = SiteSttings::where('id', 1)->first();
        // if settings and logo exist $image is settings->logo
        $image = $settings->logo ?? "";
        if ($request->hasFile('logo')) {
            $image = $this->upload_image($request->file('logo'), 'upload/settings', str_replace(' ', '', $request->file('logo')->getClientOriginalName()));
        }
        $menu_path = $settings->menu_path ?? "";
        if ($request->hasFile('menu_path')) {
            $menu_path = $this->upload_image($request->file('menu_path'), 'upload/menu', str_replace(' ', '', $request->file('menu_path')->getClientOriginalName()));
        }
        if (!$settings) {
            $settings = new SiteSttings();

            $settings->name = $request->name;
            $settings->logo = $image;
            $settings->contact_email = $request->contact_email;
            $settings->contact_phone = $request->contact_phone;
            $settings->contact_address = $request->contact_address;
            $settings->menu_path = $menu_path;
            $settings->save();
        } else {
            $settings =  SiteSttings::where('id', 1)->update([
                'name' => $request->name,
                'logo' => $image,
                'contact_email' => $request->contact_email,
                'contact_phone' => $request->contact_phone,
                'contact_address' => $request->contact_address,
                'menu_path' => $menu_path,
            ]);
        }

        return redirect(route('admin.settings'));
    }

    public function privacy_policy()
    {
        $settings =  SiteSttings::select('privacy_policy')->where('id', 1)->get()->first();
        $privacy_policy = $settings->privacy_policy;
        return view('admin.privacy-policy', compact('privacy_policy'));
    }

    public function update_privacy_policy(Request $request)
    {
        $request->validate([
            'privacy_policy' => 'required',
        ]);

        $settings = SiteSttings::where('id', 1)->first();

        $settings->privacy_policy = $request->privacy_policy;

        $settings->save();

        return redirect('/admin/privacy-policy');
    }

    public function terms_and_conditions()
    {
        $settings =  SiteSttings::select('terms_and_conditions')->where('id', 1)->get()->first();
        $terms_and_conditions = $settings->terms_and_conditions;

        return view('admin.terms-and-conditions', compact('terms_and_conditions'));
    }

    public function update_terms_and_conditions(Request $request)
    {
        $request->validate([
            'terms_and_conditions' => 'required',
        ]);

        $settings = SiteSttings::where('id', 1)->first();

        $settings->terms_and_conditions = $request->terms_and_conditions;

        $settings->save();

        return redirect(route('admin.terms-and-conditions'));
    }

    public function delivery_policy()
    {
        $settings =  SiteSttings::select('delivery_policy')->where('id', 1)->get()->first();
        $delivery_policy = $settings->delivery_policy;
        return view('admin.delivery-policy', compact('delivery_policy'));
    }

    public function update_delivery_policy(Request $request)
    {
        $request->validate([
            'delivery_policy' => 'required',
        ]);

        $settings = SiteSttings::where('id', 1)->first();

        $settings->delivery_policy = $request->delivery_policy;

        $settings->save();

        return redirect(route('admin.delivery-policy'));
    }

    public function return_policy()
    {
        $settings =  SiteSttings::select('return_policy')->where('id', 1)->get()->first();
        $return_policy = $settings->return_policy;
        return view('admin.return-policy', compact('return_policy'));
    }

    public function update_return_policy(Request $request)
    {
        $request->validate([
            'return_policy' => 'required',
        ]);

        $settings = SiteSttings::where('id', 1)->first();

        $settings->return_policy = $request->return_policy;

        $settings->save();

        return redirect(route('admin.return-policy'));
    }
}
