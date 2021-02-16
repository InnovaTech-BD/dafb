<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $guarded=['id'];

    public function setImageAttribute($value){
        $this->attributes['image']=$value->store('team');
    }

    public function getNameAttribute($value){
        //dd(gettype($data),$data);
        return json_decode($value,true);
    }

    public function getdesignationAttribute($value){
        //dd(gettype($data),$data);
        return json_decode($value,true);
    }

}
