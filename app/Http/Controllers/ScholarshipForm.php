<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Scholarship;

class ScholarshipForm extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $attributes=$request->validate([
            'firstname'=>'required|string',
            'lastname'=>'required|string',
            'gender'=>'required|string',
            'fathers'=>'required|string',
            'address'=>'required|string',
            'postal'=>'required',
            'phone'=>'required',
            'schoolphone'=>'required',
            'email'=>'required|email',
            'schoolname'=>'required|string',
            'schoolrole'=>'required',
            'grade'=>'required'
        ]);

        Scholarship::create($attributes);

        return back()->with('success','Thanks for submitting');
    }
}
