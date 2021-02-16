<?php

namespace App\Http\Controllers\Backend;

use App\Models\AnualReport;
use Illuminate\Http\Request;
use App\http\Controllers\Controller;

class AnualReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.Reports.index',[
            'reports'=>AnualReport::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.Reports.form');
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
            'file'=>'required|mimes:pdf',
            'en_headline'=>'required',
            'en_description'=>'required',
            'bn_headline'=>'required',
            'bn_description'=>'required',
            'de_headline'=>'required',
            'de_description'=>'required',
            'en_buttomdesc'=>'required',
            'bn_buttomdesc'=>'required',
            'de_buttomdesc'=>'required',
        ]);
        
        AnualReport::create([
            'type'=>$request->type,
            'headline'=>stringMaker($request,'headline'),
            'file'=>$request->file,
            'description'=>stringMaker($request,'buttomdesc'),
            'buttom_desc'=>stringMaker($request,'buttomdesc')
        ]);

        return redirect()->route('app.reports.index')->with('success','Report created');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AnualReport  $anualReport
     * @return \Illuminate\Http\Response
     */
    public function show(AnualReport $anualReport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AnualReport  $anualReport
     * @return \Illuminate\Http\Response
     */
    public function edit(AnualReport $anualReport)
    { 
        return view('backend.Reports.form',[
            'report'=>$anualReport
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AnualReport  $anualReport
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AnualReport $anualReport)
    {
        $request->validate([
            'en_headline'=>'required',
            'en_description'=>'required',
            'bn_headline'=>'required',
            'bn_description'=>'required',
            'de_headline'=>'required',
            'de_description'=>'required',
            'en_buttomdesc'=>'required',
            'bn_buttomdesc'=>'required',
            'de_buttomdesc'=>'required',
        ]);

        $attributes=[
            'headline'=>stringMaker($request,'headline'),
            'description'=>stringMaker($request,'buttomdesc'),
            'buttom_desc'=>stringMaker($request,'buttomdesc')
        ];

        if($request->hasFile('file')){
            $request->validate([
                'file'=>'required|mimes:pdf',
            ]);
            $attributes['file']=$request->file;
        }
        
        $anualReport->update($attributes);

        return redirect()->route('app.reports.index')->with('success','Report updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AnualReport  $anualReport
     * @return \Illuminate\Http\Response
     */
    public function destroy(AnualReport $anualReport)
    {
        //
    }
}
