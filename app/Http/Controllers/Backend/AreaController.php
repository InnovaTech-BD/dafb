<?php

namespace App\Http\Controllers\Backend;

use App\Models\Area;
use Illuminate\Http\Request;
use App\http\Controllers\Controller;

class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.Areas.index',[
            'areas'=>Area::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.Areas.form');
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
            'image'=>'required|mimes:jpg,png,jpeg'
        ]);

        Area::create([
            'headline'=>stringMaker($request,'headline'),
            'image'=>$request->image
        ]);

        return redirect()->route('app.areas.index')->with('success','Area Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function show(Area $area)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function edit(Area $area)
    {
        return view('backend.Areas.form',[
            'area'=>$area
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Area $area)
    {
        $request->validate([
            'en_headline'=>'required',
            'bn_headline'=>'required',
            'de_headline'=>'required',
        ]);
        $attributes=[
            'headline'=>stringMaker($request,'headline'),
        ];
        if($request->hasFile('image')){
            $request->validate([
                'image'=>'required|mimes:jpg,png,jpeg'
            ]);
            $attributes['image']=$request->image;
        }

        $area->update($attributes);

        return redirect()->route('app.areas.index')->with('success','Area Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function destroy(Area $area)
    {
        $area->delete();
        return redirect()->route('app.areas.index')->with('success','Area Deleted');
    }
}
