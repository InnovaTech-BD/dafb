<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;

    protected $guarded=['id'];

    public function slider(){
        return $this->belongsTo(slider::class);
    }

    public function gallery(){
        return $this->belongsTo(Gallery::class);
    }

    public function hasSlider(){
        if($this->slider!=null){
            return true;
        }else{
            return false;
        }
    }

    public function hasGallery(){
        if($this->gallery!=null){
            return true;
        }else{
            return false;
        }
    }
    //getters

    public function getHeadlineAttribute($value){
        return json_decode($value,true);
    }

    public function getHeadline2Attribute($value){
        return json_decode($value,true);
    }

    public function getDescriptionAttribute($value){
        return json_decode($value,true);
    }

    public function getDescription2Attribute($value){
        return json_decode($value,true);
    }
}
