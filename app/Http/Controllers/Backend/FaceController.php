<?php

namespace App\Http\Controllers\Backend;

use App\Models\Face;
use Illuminate\Http\Request;
use App\http\Controllers\Controller;

class FaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.Faces.index',[
            'faces'=>Face::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.Faces.form');
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
            'image'=>'required|mimes:jpeg,jpg,png',
            'en_description'=>'required|max:200',
            'bn_description'=>'required|max:200',
            'de_description'=>'required|max:200',
        ]);

        Face::create([
            'image'=>$request->image,
            'description'=>stringMaker($request,'description'),
        ]);

        return redirect()->route('app.faces.index')->with('success','Happy face created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Face  $face
     * @return \Illuminate\Http\Response
     */
    public function show(Face $face)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Face  $face
     * @return \Illuminate\Http\Response
     */
    public function edit(Face $face)
    {
        return view('backend.Faces.form',[
            'face'=>$face
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Face  $face
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Face $face)
    {
        $request->validate([
            'en_description'=>'required|max:200',
            'bn_description'=>'required|max:200',
            'de_description'=>'required|max:200',
        ]);
        
        $attributes=[
            'description'=>stringMaker($request,'description')
        ];

        if($request->hasFile('image')){
            $request->validate([
                'image'=>'required|mimes:jpeg,jpg,png',
            ]);
            $attributes['image']=$request->image;
        }

        $face->update($attributes);

        return redirect()->route('app.faces.edit',$face->id)->with('success','Happy face updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Face  $face
     * @return \Illuminate\Http\Response
     */
    public function destroy(Face $face)
    {
        $face->delete();
        return redirect()->route('app.faces.index')->with('success','Happy face deleted');
    }
}
