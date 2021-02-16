<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Event extends Model
{
    use HasFactory;

    protected $guarded=['id'];

    public function slider(){
        return $this->hasOne(slider::class);
    }

    public function gallery(){
        return $this->hasOne(Gallery::class);
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
        //dd(gettype($data),$data);
        return json_decode($value,true);
    }

    public function getDescriptionAttribute($value){
        return json_decode($value,true);
    }
    //setters

    public function setImageAttribute($value){
        $this->attributes['image']=$value->store('events');
    }

    public function setSlugAttribute($value){
        $this->attributes['slug']=Str::slug($value);
    }

}
