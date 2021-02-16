<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\About;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        About::create([
            'headline'=>'{"en":"Stand up for human dignity","bn":"ডিএএফবি এর অঞ্চল","de":"rkung ultra-armer Familien"}',
            'headline2'=>'{"en":"Stand up for human dignity","bn":"ডিএএফবি এর অঞ্চল","de":"rkung ultra-armer Familien"}',
            'description'=>'{"en":"Stand up for human dignity","bn":"ডিএএফবি এর অঞ্চল","de":"rkung ultra-armer Familien"}',
            'description2'=>'{"en":"Stand up for human dignity","bn":"ডিএএফবি এর অঞ্চল","de":"rkung ultra-armer Familien"}',
        ]);
    }
}
