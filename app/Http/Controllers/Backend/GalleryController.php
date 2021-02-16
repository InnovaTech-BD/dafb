<?php

namespace App\Http\Controllers\Backend;

use App\Models\Gallery;
use App\Models\Project;
use App\Models\Event;
use App\Models\Image;
use App\Models\About;
use Illuminate\Http\Request;
use App\http\Controllers\Controller;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.Galleries.index',[
            'galleries'=>Gallery::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        return view('backend.Galleries.form',[
            'projects'=>Project::latest()->get(),
            'events'=>Event::latest()->get(),
            'about'=>About::latest()->first()
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
        if(!$request->project && !$request->event && !$request->pages){
            $request->validate([
                'project'=>'required',
                'event'=>'required',
                'page'=>'required',
            ]);              
        }
        $gallery=Gallery::create([
            'project_id'=>$request->project,
            'event_id'=>$request->event
        ]);   
        $request->validate([
            'image'=>'required|mimes:jpeg,jpg,png',
        ]);
        $gallery->images()->create([
            'image'=>$request->image,
        ]);

        $pages=['about'];
        if($request->has('pages')){
            foreach($pages as $page){
                if(in_array($page,$request->pages)){
                    if($page=='about'){
                        if(About::latest()->first()){
                            About::latest()->first()->update([
                                'gallery_id'=>$gallery->id
                            ]);
                        }
                    }
                }
            }
        }

        return redirect()->route('app.galleries.edit',$gallery->id)->with('success','gallery Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function show(Gallery $gallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function edit(Gallery $gallery)
    {
        return view('backend.Galleries.form',[
            'gallery'=>$gallery,
            'projects'=>Project::latest()->get(),
            'events'=>Event::latest()->get(),
            'about'=>About::latest()->first()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gallery $gallery)
    {
        if(!$request->project && !$request->event && !$request->pages){
            $request->validate([
                'project'=>'required',
                'event'=>'required',
            ]);              
        }
        $gallery->update([
            'project_id'=>$request->project,
            'event_id'=>$request->event
        ]);   
        if($request->hasFile('image')){
            $gallery->images()->create([
                'image'=>$request->image,
            ]);
        }
        $pages=['about'];
        if($request->has('pages')){
            foreach($pages as $page){
                if(in_array($page,$request->pages)){
                    if($page=='about'){
                        if(About::latest()->first()){
                            About::latest()->first()->update([
                                'gallery_id'=>$gallery->id
                            ]);
                        }
                    }
                }else{
                    if($page=='about'){
                        if(About::latest()->first()){
                            About::latest()->first()->update([
                                'gallery_id'=>null
                            ]);
                        }
                    } 
                }
            }
        }else{
            if(About::latest()->first() && About::latest()->first()->hasGallery()&&About::latest()->first()->gallery->id==$gallery->id){
                About::latest()->first()->update([
                    'gallery_id'=>null
                ]);
            }
        } 

        return redirect()->route('app.galleries.edit',$gallery->id)->with('success','Gallery Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gallery $gallery)
    {
        $gallery->delete();
        return redirect()->route('app.galleries.index')->with('success','Gallery deleted');
    }
}
