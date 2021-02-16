<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Module;
use Illuminate\support\Str;

class ModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
            //
    $userModule=Module::create([
        'title'=>"User's",
        'slug'=>Str::slug("User's")
    ]);
    $userModule->permissions()->create([
        'title'=>'View any',
        'slug' =>'app.users.index'
    ]);
    $userModule->permissions()->create([
        'title'=>'Create',
        'slug' =>'app.users.user.create'
    ]);
    $userModule->permissions()->create([
        'title'=>'Store',
        'slug' =>'app.users.user.store'
    ]);
    $userModule->permissions()->create([
        'title'=>'Profile',
        'slug' =>'app.users.user.show'
    ]);
    $userModule->permissions()->create([
        'title'=>'Edit',
        'slug' =>'app.users.user.edit'
    ]);
    $userModule->permissions()->create([
        'title'=>'Update',
        'slug' =>'app.users.user.update'
    ]);
    $userModule->permissions()->create([
        'title'=>'Delete',
        'slug' =>'app.users.user.destroy'
    ]);


    //Role

    $roleModule=Module::create([
        'title'=>"Role's",
        'slug'=>Str::slug("Role's")
    ]);
    $roleModule->permissions()->create([
        'title'=>'View any',
        'slug' =>"app.settings.roles.index"
    ]);
    $roleModule->permissions()->create([
        'title'=>'Create',
        'slug' =>"app.settings.roles.role.create"
    ]);
    $roleModule->permissions()->create([
        'title'=>'Store',
        'slug' =>"app.settings.roles.role.store"
    ]);
    $roleModule->permissions()->create([
        'title'=>'Edit',
        'slug' =>"app.settings.roles.role.edit"
    ]);
    $roleModule->permissions()->create([
        'title'=>'Update',
        'slug' =>"app.settings.roles.role.update"
    ]);
    $roleModule->permissions()->create([
        'title'=>'Delete',
        'slug' =>"app.settings.roles.role.destroy"
    ]);
    }
}
