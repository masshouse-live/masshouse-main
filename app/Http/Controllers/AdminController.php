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
use App\Models\NewsletterSubscription;
use App\Models\Order;
use App\Models\OrderTrend;
use App\Models\ProductCategory;
use App\Models\ReservationTrend;
use App\Models\TeamMember;
use App\Models\Table;
use App\Models\TableReservation;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Spatie\Newsletter\Facades\Newsletter;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'reservation_from' => 'nullable|date',
            'reservation_to' => 'nullable|date|after_or_equal:reservation_from',
            'orders_from' => 'nullable|date',
            'orders_to' => 'nullable|date|after_or_equal:orders_from',
        ]);

        $reservation_from = $request->reservation_from ?? '';
        $reservation_to = $request->reservation_to ?? '';

        $reservationTrend = ReservationTrend::query();

        if (!empty($reservation_from) && !empty($reservation_to)) {
            $reservationTrend->whereBetween('date', [$reservation_from, $reservation_to]);
        } else {
            $reservationTrend->whereBetween('date', [now()->subDays(30), now()]);
        }

        $reservationTrend = $reservationTrend->orderBy('date', 'asc')->orderBy('hour', 'asc')->get();


        $ordersTrend = OrderTrend::query();

        if (!empty($request->orders_from) && !empty($request->orders_to)) {
            $ordersTrend->whereBetween('date', [$request->orders_from, $request->orders_to]);
        } else {
            $ordersTrend->whereBetween('date', [now()->subDays(30), now()]);
        }

        $ordersTrend = $ordersTrend->orderBy('date', 'asc')->get();

        return view('admin.index', compact('reservationTrend', 'ordersTrend'));
    }

    public function users_list(Request $request)
    {
        $search = $request->search ?? '';
        $status = $request->status ?? ''; // 1 or 0
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
        if ($status == 'active') {
            $users->where('is_active', true);
        } else if ($status == 'inactive') {
            $users->where('is_active', false);
        }

        // Apply date range filter only if both from_date and to_date are provided
        if (!empty($from_date) && !empty($to_date)) {
            $to_date = $to_date . ' 23:59:59';
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


    public function newsletter_list(Request $request)
    {

        $search = $request->search ?? '';
        $subscribed = $request->subscribed ?? '';
        $from_date = $request->from_date ?? '';
        $to_date = $request->to_date ?? '';


        $subscribers = NewsletterSubscription::query();

        if ($search) {
            $subscribers->where('email', 'like', '%' . $search . '%');
        }
        // Apply active filter only if it's set (not an empty string)
        if (Str::length($subscribed) > 0) {
            if ($subscribed == '1') {
                $subscribers->where('subscribed', true);
            } else if ($subscribed == '0') {
                $subscribers->where('subscribed', false);
            }
        }


        if (!empty($from_date) && !empty($to_date)) {
            $to_date = $to_date . " 23:59:59";
            $subscribers->whereBetween('created_at', [$from_date, $to_date]);
        }

        if (!empty($from_date) && empty($to_date)) {
            $subscribers->where('created_at', '>=', $from_date);
        }


        $subscribers = $subscribers->paginate(20);

        return view('admin.newsletter', compact('subscribers'));
    }


    public function delete_subscriber(Request $request)
    {

        $id = $request->id;

        $subscriber = NewsletterSubscription::find($id);
        $subscriber->delete();

        Newsletter::delete($subscriber->email);

        return redirect()->back()->with('success', 'Subscriber deleted successfully!');
    }

    public function unsubscribe_newsletter(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            "subscribed" => 'required'
        ]);
        $input = $request->all();
        // mark subscribed as false or true
        // subscribe to newsletter or unsubscribe
        if ($input['subscribed'] == 1) {
            NewsletterSubscription::where('email', $input['email'])->update(['subscribed' => $input['subscribed']]);
            Newsletter::subscribe($input['email']);
        } else {
            NewsletterSubscription::where('email', $input['email'])->update(['subscribed' => $input['subscribed']]);
            Newsletter::unsubscribe($input['email']);
        }
        return json_encode(['success' => true]);
    }


    public function events_list(Request $request)
    {
        $search = $request->search ?? '';
        $from_date = $request->from_date ?? '';
        $to_date = $request->to_date ?? '';
        $filter_tag = $request->filter_tag ?? '';
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
            $to_date = $to_date . " 23:23:59";
            $events->whereBetween('date_time', [$from_date, $to_date]);
        }

        if (!empty($filter_tag)) {
            $events->where('tag', $filter_tag);
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
            $banner = $this->upload_image($request->file('banner'), 'upload/events', str_replace(' ', '', $request->file('banner')->getClientOriginalName()));

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
                $banner = $this->upload_image($request->file('banner'), 'upload/events', str_replace(' ', '', $request->file('banner')->getClientOriginalName()));
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


    public function playlist(Request $request)
    {
        $search = $request->search ?? '';
        $from_date = $request->from_date ?? '';
        $to_date = $request->to_date ?? '';

        $playlist = Playlist::query();


        if (!empty($search)) {
            $playlist->where('title', 'like', '%' . $search . '%');
        }


        if (!empty($from_date) && !empty($to_date)) {
            $to_date = $to_date . " 23:23:59";
            $playlist->whereBetween('created_at', [$from_date, $to_date]);
        }

        // if only from date
        if (!empty($from_date) && empty($to_date)) {
            $playlist->where('created_at', '>=', $from_date);
        }

        // if only to date
        if (empty($from_date) && !empty($to_date)) {
            $playlist->where('created_at', '<=', $to_date);
        }


        $playlist = $playlist->paginate(10);


        return view('admin.playlist', compact('playlist'));
    }

    public function add_media(Request $request)
    {

        try {
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
        } catch (\Illuminate\Validation\ValidationException $e) {
            dd($e->errors());
        }
    }

    public function edit_media(Request $request)
    {

        $request->validate([
            'title' => 'required',
            "spotify_link" => "required",
            "youtube_link" => "required",
            "souncloud_link" => "required",
            "applemusic_link" => "required",
        ]);


        $playlist = Playlist::find($request->id);
        $image = $playlist->image;


        if ($request->hasFile('image')) {
            $image = $this->upload_image($request->file('image'), 'upload/playlist', str_replace(' ', '', $request->file('image')->getClientOriginalName()));
        }


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
            'logo_black' => 'required',
            'logo_white' => 'required',
            'url' => 'required',
        ]);

        $logo_black = $this->upload_image($request->file('logo_black'), 'upload/sponsors', str_replace(' ', '', $request->file('logo_black')->getClientOriginalName()));
        $logo_white = $this->upload_image($request->file('logo_white'), 'upload/sponsors', str_replace(' ', '', $request->file('logo_white')->getClientOriginalName()));

        $sponsor = new Sponsor();
        $sponsor->name = $request->name;
        $sponsor->logo_black = $logo_black;
        $sponsor->logo_white = $logo_white;
        $sponsor->url = $request->url;
        $sponsor->rank = Sponsor::all()->count() + 1;
        $sponsor->save();
        return redirect(route('admin.sponsors'));
    }

    public function edit_sponsor(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',
                'url' => 'required',
                'id' => 'required',
            ]);

            $sponsor = Sponsor::find($request->id);
            $logo_black = $sponsor->logo_black;

            if ($request->hasFile('logo_black')) {
                $logo_black = $this->upload_image($request->file('logo_black'), 'upload/sponsors', str_replace(' ', '', $request->file('logo_black')->getClientOriginalName()));
            }
            $logo_white =  $sponsor->logo_white;
            if ($request->hasFile('logo_white')) {
                $logo_white = $this->upload_image($request->file('logo_white'), 'upload/sponsors', str_replace(' ', '', $request->file('logo_white')->getClientOriginalName()));
            }

            $sponsor->name = $request->name;
            $sponsor->logo_black = $logo_black;
            $sponsor->logo_white = $logo_white;
            $sponsor->url = $request->url;
            $sponsor->save();


            return redirect(route('admin.sponsors'));
        } catch (\Illuminate\Validation\ValidationException $e) {
            dd($e->errors());
        }
    }

    public function news_list(Request $request)
    {

        $search = $request->search ?? '';
        $from_date = $request->from_date ?? '';
        $filter_category = $request->filter_category ?? '';
        $to_date = $request->to_date ?? '';
        // search title, short description, description
        $news = News::query();
        if (!empty($search)) {
            $news = $news->where(function ($query) use ($search) {
                $query->where('title', 'like', '%' . $search . '%')
                    ->orWhere('short_description', 'like', '%' . $search . '%')
                    ->orWhere('description', 'like', '%' . $search . '%');
            });
        }

        if (!empty($from_date) && !empty($to_date)) {
            $to_date = $to_date . " 23:23:59";
            $news = $news->whereBetween('created_at', [$from_date, $to_date]);
        }

        if (!empty($from_date) && empty($to_date)) {
            $news = $news->where('created_at', '>=', $from_date);
        }

        if (empty($from_date) && !empty($to_date)) {
            $to_date = $to_date . " 23:23:59";
            $news = $news->where('created_at', '<=', $to_date);
        }


        if (!empty($filter_category)) {
            $news = $news->where('category', $filter_category);
        }


        $news = $news->orderBy('id', 'desc')->paginate(10);


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
        $short_description = substr($short_description, 0, 100);
        $news = new News();
        $news->title = $request->title;
        $news->category = $request->category;
        $news->short_description = $short_description;
        $news->description = $request->description;
        $news->slug = Str::slug($request->title);
        $news->created_by = Auth::user()->name;
        $news->views = 0;
        $news->image = $image;

        $news->save();
        return redirect(route('admin.news'));
    }

    public function edit_news(Request $request)
    {

        $request->validate([
            'title' => 'required',
            'category' => 'required',
            'description' => 'required',
            'id' => 'required',
        ]);


        $news = News::find($request->id);


        $image = $news->image;


        if ($request->hasFile('image')) {
            $image = $this->upload_image($request->file('image'), 'upload/news', str_replace(' ', '', $request->file('image')->getClientOriginalName()));
        }


        // remove html tags and get the first 50 words
        $short_description  = strip_tags($request->description);
        $short_description = substr($short_description, 0, 100);


        $news->title = $request->title;
        $news->category = $request->category;
        $news->short_description = $short_description;
        $news->description = $request->description;
        $news->slug = Str::slug($request->title);
        $news->image = $image;


        $news->save();
        return redirect(route('admin.news'));
    }

    public function merchandise_categories(Request $request)
    {

        $search = $request->search ?? '';
        $merchandise_categories = ProductCategory::query();
        if (!empty($search)) {
            $merchandise_categories = $merchandise_categories->where(function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%');
            });
        }
        $merchandise_categories = $merchandise_categories->orderBy('id', 'desc')->paginate(10);
        return view('admin.merchandise_categories', compact('merchandise_categories'));
    }

    public function create_category(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',
                'image' => 'required',
                'subtitle' => 'required',
                'price_from' => 'required',
            ]);


            $image = $this->upload_image($request->file('image'), 'upload/merchandise', str_replace(' ', '', $request->file('image')->getClientOriginalName()));
            $merchandise_category = new ProductCategory();
            $merchandise_category->name = $request->name;
            $merchandise_category->subtitle = $request->subtitle;
            $merchandise_category->slug = Str::slug($request->name);
            $merchandise_category->image = $image;
            $merchandise_category->type = $request->type ?? null;
            $merchandise_category->tags = $request->tags ?? '';
            $merchandise_category->price_from = $request->price_from;
            $merchandise_category->save();
            return redirect(route('admin.merchandise_categories'));
        } catch (\Exception $e) {
            dd($e);
        }
    }

    public function update_category(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'subtitle' => 'required',
            'price_from' => 'required',
            'id' => 'required',
        ]);


        $merchandise_category = ProductCategory::find($request->id);


        $image = $merchandise_category->image;


        if ($request->hasFile('image')) {
            $image = $this->upload_image($request->file('image'), 'upload/merchandise', str_replace(' ', '', $request->file('image')->getClientOriginalName()));
        }


        $merchandise_category->name = $request->name;
        $merchandise_category->subtitle = $request->subtitle;
        $merchandise_category->slug = Str::slug($request->name);
        $merchandise_category->image = $image;
        $merchandise_category->type = $request->type ?? null;
        $merchandise_category->tags = $request->tags ?? '';
        $merchandise_category->price_from = $request->price_from;
        $merchandise_category->save();
        return redirect(route('admin.merchandise_categories'));
    }

    public function highlight_category(Request $request)
    {
        $id = $request->id;

        // Set the highlight field of all categories to false in one query
        ProductCategory::where('highlight', true)->update(['highlight' => false]);

        // Find the selected category and toggle its highlight status
        $category = ProductCategory::find($id);
        $category->highlight = true; // Ensure this category is now highlighted
        $category->save();

        return redirect(route('admin.merchandise_categories'));
    }


    public function merchandise(Request $request)
    {

        $search = $request->search ?? '';
        $category = $request->filter_category ?? '';
        $gender = $request->filter_gender ?? '';
        $size = $request->filter_size ?? '';
        $color = $request->filter_color ?? '';
        $merchandise = Merchandise::with("category");


        if (!empty($search)) {
            $merchandise = $merchandise->where(function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%')
                    ->orWhere('gender', 'like', '%' . $search . '%')
                    ->orWhere('sizes', 'like', '%' . $search . '%')
                    ->orWhere('colors', 'like', '%' . $search . '%')
                    ->orWhere('description', 'like', '%' . $search . '%')
                    ->orWhere('price', 'like', '%' . $search . '%');
            });
        }


        if (!empty($category)) {

            $category = ProductCategory::where('slug', $category)->first()->id;
            $merchandise = $merchandise->where('product_category_id', $category);
        }

        if (!empty($gender)) {
            $merchandise = $merchandise->where('gender', $gender);
        }


        if (!empty($size)) {
            $merchandise = $merchandise->where('sizes', 'like', '%' . $size . '%');
        }


        if (!empty($color)) {
            $merchandise = $merchandise->where('colors', 'like', '%' . $color . '%');
        }


        $merchandise = $merchandise->orderBy('id', 'desc')->paginate(10);

        $categories = ProductCategory::get();


        return view('admin.merchandise', compact('merchandise', 'categories'));
    }

    public function merch_orders(Request $request)
    {
        $status = $request->status ?? '';
        $from_date = $request->from_date ?? '';
        $to_date = $request->to_date ?? '';
        $search = $request->search ?? '';


        $merch_orders = Order::with('product_orders.merchandise');


        if (!empty($status)) {
            $merch_orders = $merch_orders->where('status', $status);
        }


        if (!empty($from_date) && !empty($to_date)) {
            $to_date = $to_date . " 23:23:59";
            $merch_orders->whereBetween('created_at', [$from_date, $to_date]);
        }


        if (!empty($from_date) && empty($to_date)) {
            $merch_orders->where('created_at', '>=', $from_date);
        }


        if (empty($from_date) && !empty($to_date)) {
            $to_date = $to_date . " 23:23:59";
            $merch_orders->where('created_at', '<=', $to_date);
        }


        if (!empty($search)) {
            $merch_orders = $merch_orders->where(function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%')
                    ->orWhere('email', 'like', '%' . $search . '%')
                    ->orWhere('phone', 'like', '%' . $search . '%')
                    ->orWhere('address', 'like', '%' . $search . '%')
                    ->orWhere('status', 'like', '%' . $search . '%');
            });
        }


        $merch_orders = $merch_orders->orderBy('id', 'desc')->paginate(10);



        return view('admin.merch-orders', compact("merch_orders"));
    }

    public function add_product(Request $request)
    {
        try {
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

            // find category given slug
            $category = ProductCategory::where('slug', $request->category)->first();

            $merchandise->name = $request->name;
            $merchandise->gender = $request->gender;
            $merchandise->slug = Str::slug($request->name) . '-' . Str::random(5);
            $merchandise->sizes = $request->sizes;
            $merchandise->colors = $request->colors;
            $merchandise->description = $request->description ?? "";
            $merchandise->price = $request->price;
            $merchandise->image = $image;
            $merchandise->stock = $request->stock ?? 0;
            $merchandise->product_category_id = $category->id;


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
        } catch (\Exception $e) {
            dd($e);
        }
    }


    public function edit_product(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',
                'gender' => 'required',
                'sizes' => 'required',
                'colors' => 'required',
                'description' => 'required',
                'price' => 'required',
                'stock' => 'required',
                'category' => 'required',
                'id' => 'required',
            ]);
            $merchandise = Merchandise::find($request->id);


            $image = $request->image ?? $merchandise->image;
            $category = ProductCategory::where('slug', $request->category)->first();

            if ($request->hasFile('image')) {
                $image = $this->upload_image($request->file('image'), 'upload/merchandise', str_replace(' ', '', $request->file('image')->getClientOriginalName()));
            }

            $merchandise->name = $request->name;
            $merchandise->gender = $request->gender;
            $merchandise->sizes = $request->sizes;
            $merchandise->colors = $request->colors;
            $merchandise->description = $request->description;
            $merchandise->price = $request->price;
            $merchandise->image = $image;
            $merchandise->stock = $request->stock ?? 0;
            $merchandise->product_category_id = $category->id;


            $merchandise->save();
            // order by id
            $images = $merchandise->images()->orderBy('id', 'asc')->get();
            for ($i = 1; $i <= 5; $i++) {
                if ($request->hasFile('image' . $i)) {  // Check if the file exists
                    $image = $this->upload_image(
                        $request->file('image' . $i),
                        'upload/merchandise',
                        str_replace(' ', '', $request->file('image' . $i)->getClientOriginalName())
                    );
                    if ($i < count($images)) {
                        $images[$i - 1]->image = $image;
                        $images[$i - 1]->save();
                    } else {
                        $merchandise->images()->create([
                            'image' => $image,
                            "merchandise_id" => $merchandise->id
                        ]);
                    }
                }
            }


            return redirect(route('admin.merchandise'));
        } catch (\Exception $e) {
            dd($e);
        }
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

    public function contact_details(Request $request)
    {

        $contact = Contact::where('id', $request->id)->first();
        return view('admin.contact-details', compact('contact'));
    }

    public function settings()
    {
        $settings =  SiteSttings::select(
            'name',
            'logo',
            'contact_email',
            'reservation_from',
            'reservation_to',
            'contact_phone',
            'contact_address',
            'menu_path'
        )->where('id', 1)->get();
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
            'reservation_from' => 'required',
            'reservation_to' => 'required',
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
            $settings->reservation_from = $request->reservation_from;
            $settings->reservation_to = $request->reservation_to;
            $settings->contact_address = $request->contact_address;
            $settings->menu_path = $menu_path;
            $settings->save();
        } else {

            $reservation_from = $request->reservation_from ?? "";

            if (!empty($reservation_from)) {
                // Assuming the HTML time format is 'HH:MM'
                $timeParts = explode(':', $request->reservation_from);
                if (count($timeParts) > 0) {
                    $reservation_from = $timeParts[0]; // Extract the hour part
                }
            }

            $reservation_to = $request->reservation_to ?? "";
            if (!empty($reservation_to)) {
                $timeParts = explode(':', $request->reservation_to);

                if (count($timeParts) > 0) {
                    $reservation_to = $timeParts[0]; // Extract the hour part
                }
            }
            $settings =  SiteSttings::where('id', 1)->update([
                'name' => $request->name,
                'logo' => $image,
                'contact_email' => $request->contact_email,
                'contact_phone' => $request->contact_phone,
                'contact_address' => $request->contact_address,
                'menu_path' => $menu_path,
                'reservation_from' => $reservation_from,
                'reservation_to' => $reservation_to
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

    public function tables()
    {

        $tables = Table::paginate(10);

        return view('admin.tables', compact("tables"));
    }

    public function add_table(Request $request)
    {

        $request->validate([
            "number_seats" => 'required',
            "total_tables" => 'required',
            "amount" => 'required'
        ]);


        $table = new Table();
        $table->number_seats = $request->number_seats;
        $table->total_tables = $request->total_tables;
        $table->amount = $request->amount;
        $table->status = "available";
        $table->save();
        return redirect(route('admin.tables'));
    }

    public function table_details(Request $request)
    {
        // Get the filtered date from the request, or default to today's date
        $date = $request->date ?? date('Y-m-d');

        // Get the start and end of the day for the specified date
        $startOfDay = $date . ' 00:00:00';
        $endOfDay = $date . ' 23:59:59';

        // Get the table based on the id from the request
        $table = Table::find($request->id);

        // Get all reservations for the given table id, and filter for the entire day
        $reservations = TableReservation::where('table_id', $request->id)
            ->whereBetween('from_date', [$startOfDay, $endOfDay])
            ->get();


        // Fetch reservation settings (reservation_from and reservation_to)
        $settings = SiteSttings::select('reservation_from', 'reservation_to')
            ->where('id', 1)
            ->first();

        // Group reservations by table_index to create array of arrays
        $groupedReservations = $reservations->groupBy('table_index');

        // Pass the grouped reservations along with the other data to the view
        return view('admin.table-details', compact("table", "groupedReservations", 'settings', 'date'));
    }
}
