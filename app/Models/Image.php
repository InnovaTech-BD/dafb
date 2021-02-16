<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $guarded=['id'];

    public function slider(){
        return $this->belongsTo(slider::class);
    }

    public function getHeadlineAttribute($value){
        return json_decode($value,true);
    }

    public function getDescAttribute($value){
        return json_decode($value,true);
    }
    //setters

    public function setImageAttribute($value){
        $this->attributes['image']=$value->store('images');
    }
}
