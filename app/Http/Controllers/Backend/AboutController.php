<?php

namespace App\Http\Controllers\Backend;

use App\Models\About;
use Illuminate\Http\Request;
use App\http\Controllers\Controller;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function show(About $about)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function edit(About $about)
    {
        return view('backend.About.form',[
            'about'=>$about
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, About $about)
    {
        $request->validate([
            'en_headline'=>'required',
            'en_headline2'=>'required',
            'en_description'=>'required',
            'en_description2'=>'required',
            'bn_headline'=>'required',
            'bn_headline2'=>'required',
            'bn_description'=>'required',
            'bn_description2'=>'required',
            'de_headline'=>'required',
            'de_headline2'=>'required',
            'de_description'=>'required',
            'de_description2'=>'required'
        ]);
        $attributes=[
            'headline'=>stringMaker($request,'headline'),
            'headline2'=>stringMaker($request,'headline2'),
            'description'=>stringMaker($request,'description'),
            'description2'=>stringMaker($request,'description'),
        ];
        $about->update($attributes);
        return redirect()->route('app.about.edit',$about->id)->with('success','About Page Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function destroy(About $about)
    {
        //
    }
}
