<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;

use Illuminate\Http\Request;
use App\Models\Event;

class EventsController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        return view('events',[
            'events'=>Event::latest()->get()
        ]);
    }


    public function show($slug){
        return view('eventShow',[
            'event'=>Event::where('slug',$slug)->first(),
            'events'=>Event::latest()->get()
        ]);
    }
}
