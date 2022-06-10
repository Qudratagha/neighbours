<?php

namespace App\Http\Controllers;

use App\Models\Feed;
use App\Models\Cattle;
use Illuminate\Http\Request;

class FeedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function cowIndex()
    {
        $feeds = Feed::where('status', 2)->where('cattle_type',2)->get();
        return view('cow_feed.index', compact('feeds'));
    }

    public function goatIndex()
    {
        $feeds = Feed::where('status', 3)->where('cattle_type',3)->get();
        return view('goat_feed.index', compact('feeds'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

//    public function indexCowFeed(){
//        return view('cow_feed.index');
//    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($request);
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


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Feed  $feed
     * @return \Illuminate\Http\Response
     */
    public function show(Feed $feed)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Feed  $feed
     * @return \Illuminate\Http\Response
     */
    public function edit(Feed $feed)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Feed  $feed
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Feed $feed)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Feed  $feed
     * @return \Illuminate\Http\Response
     */
    public function destroy($cow_feed_id)
    {
        $feedDelete = Feed::where('id',$cow_feed_id);
        $feedDelete->delete();
        return redirect()->back()->with('message', 'Cow Feed Deleted');
    }
}
