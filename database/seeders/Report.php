<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AnualReport;

class Report extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AnualReport::create([
            'type'=>'annualreport',
            'headline'=>'{"en":"Stand up for human dignity","bn":"ডিএএফবি এর অঞ্চল","de":"rkung ultra-armer Familien"}',
            'description'=>'{"en":"Stand up for human dignity","bn":"ডিএএফবি এর অঞ্চল","de":"rkung ultra-armer Familien"}',
            'buttom_desc'=>'{"en":"Stand up for human dignity","bn":"ডিএএফবি এর অঞ্চল","de":"rkung ultra-armer Familien"}',
        ]);
        AnualReport::create([
            'type'=>'financialstatement',
            'headline'=>'{"en":"Stand up for human dignity","bn":"ডিএএফবি এর অঞ্চল","de":"rkung ultra-armer Familien"}',
            'description'=>'{"en":"Stand up for human dignity","bn":"ডিএএফবি এর অঞ্চল","de":"rkung ultra-armer Familien"}',
            'buttom_desc'=>'{"en":"Stand up for human dignity","bn":"ডিএএফবি এর অঞ্চল","de":"rkung ultra-armer Familien"}',
        ]);
    }
}
