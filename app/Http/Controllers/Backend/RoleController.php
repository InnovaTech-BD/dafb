<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

use Illuminate\Support\Str;

use Illuminate\Http\Request;

use App\Models\Role;

use Illuminate\Validation\Rule;

use App\Models\Module;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $roles=Role::rolePaginate(5);
        return view('backend.settings.roles.index',[
        'roles'=>$roles
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
        return view('backend.settings.roles.form',['modules'=>Module::all()]);
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
        $request->validate([
            'title'=>['required','max:20','unique:roles'],
        ]);
        $role=Role::create([
            'title'=>$request->title,
            'slug'=>str::slug($request->title),
        ]);
        $role->createPermissions($request);
        return redirect()->route('app.settings.roles.index')
                         ->with('success',"role created sucessfully");  
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        //
        return view('backend.settings.roles.form',['role'=>$role,'modules'=>Module::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Role $role)
    {
        //dd($role);
         $request->validate([
            'title'=>['required','max:20',Rule::unique('roles')->ignore($role->id)],
        ]);
        $role->update([
            'title'=>$request->title,
            'slug'=>str::slug($request->title),
        ]);
        $role->createPermissions($request);
        return redirect()->route('app.settings.roles.index')
                         ->with('success',"role updated sucessfully");  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        //
        $role->delete();
        return redirect()->route('app.settings.roles.index')
                        ->with('success','Role deleted');
    }
}