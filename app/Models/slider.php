<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class slider extends Model
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
}
