<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;

use App\Models\User;

use Illuminate\Validation\Rule;

use Illuminate\Support\Facades\Validator;

use App\Models\Role;

use App\Models\Profile;

class UserController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users=User::all();
        return view('backend.users.index',[
            "users"=>$users
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
        return view('backend.users.form',['roles'=>Role::getAllRoles()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
       
       // dd($request->role_id);
        $request->validate([
            'name'      =>['required','max:20',],
            'email'     =>['required','unique:users','email'],
            'password'  =>['required','min:8','max:20','confirmed'],
            'phone'     =>['required','max:20'],
            'gender'    =>['required'],
            'role_id'   =>'required',
            'avatar'    =>['required','mimes:jpeg,png,jpg','max:2048'],
            'address'   =>'required'
        ]);

        //create user
        $user=User::create([
            'name'      =>$request->name,
            'email'     =>$request->email,
            'password'  =>$request->password,
            'role_id'   =>$request->role_id,
        ]);

        //profile create
        Profile::create([
            'user_id'   =>$user->id,
            'phone'     =>$request->phone,
            'gender'    =>$request->gender,
            'address'   =>$request->address,
            'avatar'    =>$request->avatar,
        ]);

        return redirect()->route('app.users.index')->with('success','User created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
        return view('backend.users.profile',[
            "user"=>$user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
        return view('backend.users.form',[
            'user'=>$user,
            'roles'=>Role::getAllRoles(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
        $attributes=$request->validate([
            'name'      =>['required','max:20',],
            'email'     =>['required',Rule::unique('users')->ignore($user->id),'email'],           
            'role_id'      =>'required',            
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

        $user->update($attributes);
        $user->profile->update($profile);


        return redirect()->route('app.users.index')->with('success','User updated successfully');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user){
        $user->delete();

        return redirect()->route('app.users.index')->with('success','User deleted');
    }
}
