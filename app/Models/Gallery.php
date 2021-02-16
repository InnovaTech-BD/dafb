<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    protected $guarded=['id'];

    public function images(){
        return $this->hasMany(Image::class);
    }

    public function project(){
        return $this->belongsTo(Project::class);
    }

    public function event(){
        return $this->belongsTo(Event::class);
    }

    public function about(){
        return $this->hasOne(About::class,'page_id');
    }


    
}
