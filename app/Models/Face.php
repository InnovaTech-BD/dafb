<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Face extends Model
{
    use HasFactory;

    protected $guarded=['id'];

    public function getDescriptionAttribute($value){
        //dd(gettype($data),$data);
        return json_decode($value,true);
    }
    
    public function setImageAttribute($value){
        $this->attributes['image']=$value->store('projects');
    }
}
