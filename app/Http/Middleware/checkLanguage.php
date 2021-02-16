<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\App;

use Closure;
use Illuminate\Http\Request;

class checkLanguage
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {   
        if(request()->has('lang') && in_array(request()->lang,['en','bn','de'])){
            $request->session()->put('locale', $request->lang);
        }
        if(session()->has('locale')){
            App::setLocale(session('locale'));
        }else{
            App::setLocale(config('app.locale'));
        }

        return $next($request);
    }
}
