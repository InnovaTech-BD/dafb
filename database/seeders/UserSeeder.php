<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use App\Models\Role;

class UserSeeder extends Seeder
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
         $role=Role::where('slug','super-admin')->first();
         $user=User::updateOrCreate([
             'name'=>'jhon doe',
             'email'=>'admin@mail.com',
             'role_id'=>$role->id,
             'password'=>'password',
 
 
         ]);
         $user->profile()->create([
             'phone'=>'0000000',
             'gender'=>'male',
             'address'=>'51/2,rangon tower,west panthapath',
         ]);
    }
}
