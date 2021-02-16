<?php

namespace Database\Seeders;
Use App\Models\Role;
use Illuminate\Support\Str;

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Role::updateOrCreate([
            'title'=>'Super Admin',
            'slug' =>Str::slug('Super Admin'),
        ]);
    }
}
