<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Models\UpcomingEvents;
use App\Models\Face;
use App\Models\Area;

class WelcomeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        return view('welcome',[
            'upcomingEvents'=>UpcomingEvents::where('date','>',Carbon::now())->get()->toArray(),
            'faces'=>Face::latest()->get(),
            'areas'=>Area::latest()->get()
        ]);
    }    
}
