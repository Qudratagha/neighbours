<?php

namespace App\Http\Controllers;

use App\Models\Feed;
use App\Models\Cattle;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Gate;

class FeedController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('auth.gates');
    }
    public function cowIndex()
    {
        abort_if(Gate::denies('cow-read'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $feeds = Feed::where('status', 2)->where('cattle_type',2)->get();
        return view('cow_feed.index', compact('feeds'));
    }

    public function goatIndex()
    {
        abort_if(Gate::denies('goat-read'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $feeds = Feed::where('status', 3)->where('cattle_type',3)->get();
        return view('goat_feed.index', compact('feeds'));
    }

    public function create()
    {

    }

    public function store(Request $request)
    {
        if (isset($_POST['submitCowFeed']))
        {
            $request['status'] = 2;
            $request['cattle_type'] = 2;
            Feed::create($request->except('submitCowFeed'));
            return redirect()->back()->with('message', 'Cow Feed Added');
        }
        if (isset($_POST['submitGoatFeed']))
        {
            $request['status'] = 3;
            $request['cattle_type'] = 3;
            Feed::create($request->except('submitGoatFeed'));
            return redirect()->back()->with('message', 'Goat Feed Added');
        }
    }

    public function show(Feed $feed)
    {
        //
    }

    public function edit(Feed $feed)
    {
        //
    }

    public function update(Request $request, Feed $feed)
    {
        //
    }

    public function destroy($cow_feed_id)
    {
        $feedDelete = Feed::where('id',$cow_feed_id);
        $feedDelete->delete();
        return redirect()->back()->with('message', 'Cow Feed Deleted');
    }
}
