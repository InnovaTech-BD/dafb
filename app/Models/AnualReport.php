<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnualReport extends Model
{
    use HasFactory;

    protected $guarded=['id'];

    //getters

    public function getHeadlineAttribute($value){
        //dd(gettype($data),$data);
        return json_decode($value,true);
    }
    //getters

    public function getDescriptionAttribute($value){
        //dd(gettype($data),$data);
        return json_decode($value,true);
    }
    //getters

    public function getButtomDescAttribute($value){
        //dd(gettype($data),$data);
        return json_decode($value,true);
    }

    public function setFileAttribute($value){
        $this->attributes['file']=$value->store('pdf');
    }
}
