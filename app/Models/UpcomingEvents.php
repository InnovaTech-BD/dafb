<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class UpcomingEvents extends Model
{
    use HasFactory;

    protected $guarded=['id'];

    //getters

    public function getHeadlineAttribute($value){
        //dd(gettype($data),$data);
        return json_decode($value,true);
    }

    public function getLocationAttribute($value){
        //dd(gettype($data),$data);
        return json_decode($value,true);
    }

    public function getDescriptionAttribute($value){
        //dd(gettype($data),$data);
        return json_decode($value,true);
    }
    //setters

    public function setImageAttribute($value){
        $this->attributes['image']=$value->store('upcoming');
    }

    public function setDateAttribute($value){
        $this->attributes['date']=Carbon::parse($value);
    }
}
