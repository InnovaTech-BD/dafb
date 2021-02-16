<?php

namespace App\Http\Controllers\Backend;

use App\Models\Project;
use Illuminate\Http\Request;
use App\http\Controllers\Controller;
use App\Rules\SlugChecker;


class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.Projects.index',[
            'projects'=>Project::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.Projects.form');
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
            'en_headline'=>['required',new SlugChecker(Project::class)],
            'image'=>['required','mimes:jpeg,jpg,png'],
            'en_description'=>'required',
            'bn_headline'=>'required',
            'bn_description'=>'required',
            'de_headline'=>'required',
            'de_description'=>'required'
        ]);
        Project::create([
            'headline'=>stringMaker($request,'headline'),
            'slug'=>$request->en_headline,
            'description'=>stringMaker($request,'description'),
            'image'=>$request->image
        ]);

        return redirect()->route('app.projects.index')->with('success','New project created');
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
    public function edit(Project $project)
    {
        return view('backend.Projects.form',[
            'project'=>$project
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        $request->validate([
            'en_headline'=>['required',new SlugChecker(Project::class,$project)],
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
        $project->update($attributes);
        return redirect()->route('app.projects.edit',$project->id)->with('success','Project Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('app.projects.index')->with('success','Project Deleted');
    }
}
