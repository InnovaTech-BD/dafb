<?php

namespace App\Http\Controllers\Backend;

use App\Models\slider;
use App\Models\Project;
use App\Models\Event;
use App\Models\Image;
use Illuminate\Http\Request;
use App\http\Controllers\Controller;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.Sliders.index',[
            'sliders'=>slider::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.Sliders.form',[
            'projects'=>Project::latest()->get(),
            'events'=>Event::latest()->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {       
        if(!$request->project && !$request->event){
            $request->validate([
                'project'=>'required',
                'event'=>'required',
            ]);              
        }
        $slider=Slider::create([
            'project_id'=>$request->project,
            'event_id'=>$request->event
        ]);   
        $request->validate([
            'image'=>'required|mimes:jpeg,jpg,png',
        ]);

        if($request->has('en_title')||$request->has('bn_title')||$request->has('bn_title')){
            $request->validate([
                'en_title'=>'required',
                'bn_title'=>'required',
                'de_title'=>'required',
            ]);
        }
        if($request->has('en_description')||$request->has('bn_description')||$request->has('de_description')){
            $request->validate([
                'en_description'=>'required',
                'bn_description'=>'required',
                'de_description'=>'required',
            ]);
        }
        $slider->images()->create([
            'image'=>$request->image,
            'headline'=>stringMaker($request,'title'),
            'desc'=>stringMaker($request,'description'),
        ]);
        return redirect()->route('app.sliders.edit',$slider->id)->with('success','Slider Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Slider $slider)
    {
        return view('backend.Sliders.form',[
            'slider'=>$slider,
            'projects'=>Project::latest()->get(),
            'events'=>Event::latest()->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,slider $slider)
    {
        if(!$request->project && !$request->event){
            $request->validate([
                'project'=>'required',
                'event'=>'required',
            ]);              
        }
        $slider->update([
            'project_id'=>$request->project,
            'event_id'=>$request->event
        ]);   
        if($request->hasFile('image')){
            $slider->images()->create([
                'image'=>$request->image,
                'headline'=>stringMaker($request,'title'),
                'desc'=>stringMaker($request,'description'),
            ]);
        }

        if($request->en_title||$request->bn_title||$request->bn_title){
            $request->validate([
                'en_title'=>'required',
                'bn_title'=>'required',
                'de_title'=>'required',
            ]);
        }

        if($request->en_description||$request->bn_description||$request->de_description){
            $request->validate([
                'en_description'=>'required',
                'bn_description'=>'required',
                'de_description'=>'required',
            ]);
        }
        return redirect()->route('app.sliders.edit',$slider->id)->with('success','Slider Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(slider $slider)
    {
        $slider->delete();
        return redirect()->route('app.sliders.index')->with('success','Slider deleted');
    }

    public function destroyImage(Image $image)
    {
        $image->delete();

        return redirect()->route('app.sliders.edit',$image->slider->id)->with('success','Image deleted from slider');
    }
}
