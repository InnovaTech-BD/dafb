<?php

namespace App\Http\Controllers;

use App\Models\Volunteer;
use Illuminate\Http\Request;

class VolunteerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  
        return view('backend/Volunteers/index',[
            'volunteers'=>Volunteer::latest()->get()
        ]);
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
        $request->validate([
            'name'=>'required',
            'postal_code'=>'required',
            'city'=>'required',
            'country'=>'required',
            'age'=>'required',
            'gender'=>'required',
            'contact'=>'required',
            'email'=>'required',
        ]);
        Volunteer::create([
            'name'=>$request->name,
            'house'=>$request->house,
            'street'=>$request->street,
            'postal'=>$request->postal_code,
            'city'=>$request->city,
            'country'=>$request->country,
            'age'=>$request->age,
            'gender'=>$request->gender,
            'phone'=>$request->contact,
            'email'=>$request->email,
        ]);
        return redirect()->route('volunteer')->with('success','Form successfully submited');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Volunteer  $volunteer
     * @return \Illuminate\Http\Response
     */
    public function show(Volunteer $volunteer)
    {
        return view('backend/Volunteers/show',[
            'volunteer'=>$volunteer
        ]);
    }

    public function status(Request $request){
        $volunteer=Volunteer::findOrFail($request->id);
        $volunteer->update([
            'status'=>$request->status
        ]);
        return back()->with('success','Status Changed');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Volunteer  $volunteer
     * @return \Illuminate\Http\Response
     */
    public function edit(Volunteer $volunteer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Volunteer  $volunteer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Volunteer $volunteer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Volunteer  $volunteer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Volunteer $volunteer)
    {
        $volunteer->delete();
        return redirect()->route('app.volunteers.index')->with('success','Volunteer removed');
    }
}
