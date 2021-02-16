<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\AnualReport;

class ReportController extends Controller
{   
    public function getReport($type){
        return view('report',[
            'report'=>AnualReport::where('type',$type)->first()
        ]);
    }
}
