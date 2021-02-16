<?php

namespace App\Http\Controllers\Backend;

use App\Models\Team;
use Illuminate\Http\Request;
use App\http\Controllers\Controller;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.Teams.index',[
            'members'=>Team::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return  view('backend.Teams.form');
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
            'en_name'=>'required',
            'bn_name'=>'required',
            'de_name'=>'required',
            'type'=>'required',
            'en_designation'=>'required',
            'bn_designation'=>'required',
            'de_designation'=>'required',
            'image'=>'required|mimes:jpeg,png,jpg',
            'email'=>'required|email'
        ]);

        Team::create([
            'name'=>stringMaker($request,'name'),
            'designation'=>stringMaker($request,'designation'),
            'type'=>$request->type,
            'image'=>$request->image,
            'email'=>$request->email
        ]);

        return redirect()->route('app.teams.index')->with('success','Team member created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function show(Team $team)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function edit(Team $team)
    {
        return  view('backend.Teams.form',[
            'member'=>$team
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Team $team)
    {
        $request->validate([
            'en_name'=>'required',
            'bn_name'=>'required',
            'de_name'=>'required',
            'type'=>'required',
            'en_designation'=>'required',
            'bn_designation'=>'required',
            'de_designation'=>'required',
            'email'=>'required|email'
        ]);

        $attributes=[
            'name'=>stringMaker($request,'name'),
            'designation'=>stringMaker($request,'designation'),
            'type'=>$request->type,
            'email'=>$request->email
        ];

        if($request->hasFile('image')){
            $request->validate([
                'image'=>'required|mimes:jpeg,png,jpg'
            ]);
            $attributes['image']=$request->image;
        }
        $team->update($attributes);

        return redirect()->route('app.teams.index')->with('success','Team member Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function destroy(Team $team)
    {
        $team->delete();
        return redirect()->route('app.teams.index')->with('success','Team member deleted');
    }
}
