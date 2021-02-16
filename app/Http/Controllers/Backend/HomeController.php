<?php

namespace App\Http\Controllers\Backend;

use App\http\Controllers\Controller;

use Illuminate\Http\Request;

use Illuminate\Validation\Rule;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        return view('backend.home.dashboard');
    }
    
    /**
     * profile
     *
     * @return void
     */
    public function profile(){
        return view('backend.profile.profile');
    }
    
    /**
     * updateProfile
     *
     * @param  mixed $request
     * @return void
     */
    public function updateProfile(Request $request){
        //
        $user=auth()->user();
        $attributes=$request->validate([
           'name'      =>['required','max:20',],
           'email'     =>['required',Rule::unique('users')->ignore($user->id),'email'],              
       ]);

       $profile=$request->validate([
           'phone'     =>['required','max:20'],
           'gender'    =>['required'],
           'address'   =>'required'
       ]);
       
       if(!empty($request['password'])){
           //dd('passwordd');
           $request->validate([
               'password'  =>['required','min:8','max:20','confirmed']
           ]);
           $attributes['password']=$request->password;
       }
       if($request->hasFile('avatar')){
           $request->validate([
               'avatar'    =>['required','mimes:jpeg,png,jpg','max:2048'],
           ]);
           $profile['avatar']=$request->avatar;
       }

      // dd($profile);
       $user->update($attributes);
       $user->profile->update($profile);




       return redirect()->back()->with('success','Profile updated successfully');
   }
}
