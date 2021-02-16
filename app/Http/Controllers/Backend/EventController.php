<?php

namespace App\Http\Controllers\Backend;

use App\Models\Event;
use Illuminate\Http\Request;
use App\http\Controllers\Controller;
use App\Rules\SlugChecker;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.Events.index',[
            'events'=>Event::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        return view('backend.Events.form');
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
            'en_headline'=>['required',new SlugChecker(Event::class)],
            'image'=>['required','mimes:jpeg,jpg,png'],
            'en_description'=>'required',
            'bn_headline'=>'required',
            'bn_description'=>'required',
            'de_headline'=>'required',
            'de_description'=>'required'
        ]);

        Event::create([
            'headline'=>stringMaker($request,'headline'),
            'slug'=>$request->en_headline,
            'description'=>stringMaker($request,'description'),
            'image'=>$request->image
        ]);

        return redirect()->route('app.events.index')->with('success','New Event created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        return view('backend.Events.form',[
            'event'=>$event
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        $request->validate([
            'en_headline'=>['required',new SlugChecker(Event::class,$event)],
            'en_description'=>'required',
            'bn_headline'=>'required',
            'bn_description'=>'required',
            'de_headline'=>'required',
            'de_description'=>'required'
        ]);

        $attributes=[
            'headline'=>stringMaker($request,'headline'),
            'slug'=>$request->en_headline,
            'description'=>stringMaker($request,'description'),
        ];

        if($request->hasFile('image')){
            $request->validate([
                'image'=>'mimes:jpeg,jpg,png'
            ]);
            $attributes['image']=$request->image;
        }
        $event->update($attributes);
        return redirect()->route('app.events.edit',$event->id)->with('success','Event Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        $event->delete();
        return redirect()->route('app.events.index')->with('success','Event Deleted');
    }
}
