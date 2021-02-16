<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;

    protected $guarded=['id'];

     //getters

     public function getHeadlineAttribute($value){
        //dd(gettype($data),$data);
        return json_decode($value,true);
    }


    public function setImageAttribute($value){
        $this->attributes['image']=$value->store('projects');
    }
}
