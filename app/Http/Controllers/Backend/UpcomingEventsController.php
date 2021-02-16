<?php

namespace App\Http\Controllers\Backend;

use App\Models\UpcomingEvents;
use Illuminate\Http\Request;
use App\http\Controllers\Controller;

class UpcomingEventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        return view('backend.UpcomingEvents.index',[
            'events'=>UpcomingEvents::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.UpcomingEvents.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $request->validate([
            'en_headline'=>'required',
            'bn_headline'=>'required',
            'de_headline'=>'required',
            'image'=>'required|mimes:jpeg,jpg,png',
            'date'=>'required|date',
            'en_location'=>'required',
            'bn_location'=>'required',
            'de_location'=>'required',
            'en_description'=>'required|max:200',
            'bn_description'=>'required|max:200',
            'de_description'=>'required|max:200',
        ]);

        UpcomingEvents::create([
            'headline'=>stringMaker($request,'headline'),
            'image'=>$request->image,
            'date'=>$request->date,
            'location'=>stringMaker($request,'location'),
            'description'=>stringMaker($request,'description')
        ]);

        return redirect()->route('app.events.upcoming.index')->with('success','Upcong event created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UpcomingEvents  $upcomingEvents
     * @return \Illuminate\Http\Response
     */
    public function show(UpcomingEvents $upcomingEvents)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UpcomingEvents  $upcomingEvents
     * @return \Illuminate\Http\Response
     */
    public function edit(UpcomingEvents $event)
    {
        return view('backend.UpcomingEvents.form',[
            'event'=>$event
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UpcomingEvents  $upcomingEvents
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UpcomingEvents $event)
    {
        $request->validate([
            'en_headline'=>'required',
            'bn_headline'=>'required',
            'de_headline'=>'required',
            'date'=>'required|date',
            'en_location'=>'required',
            'bn_location'=>'required',
            'de_location'=>'required',
            'en_description'=>'required|max:200',
            'bn_description'=>'required|max:200',
            'de_description'=>'required|max:200',
        ]);
        $attributes=[
            'headline'=>stringMaker($request,'headline'),
            'date'=>$request->date,
            'location'=>stringMaker($request,'location'),
            'description'=>stringMaker($request,'description')
        ];

        if ($request->hasFile('image')){
            $request->validate([
                'image'=>'required|mimes:jpeg,jpg,png',
            ]);
            $attributes['image']=$request->image;
        }
        $event->update($attributes);
        return redirect()->route('app.events.upcoming.edit',$event->id)->with('success','Upcoming event updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UpcomingEvents  $upcomingEvents
     * @return \Illuminate\Http\Response
     */
    public function destroy(UpcomingEvents $event)
    {   
        $event->delete();
        return redirect()->route('app.events.upcoming.index')->with('success','Upcong event deleted');
    }
}
