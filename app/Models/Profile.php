<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    
    /**
     * guarded
     *
     * @var array
     */
    protected $guarded=['id'];

    
    /**
     * user
     *
     * @return void
     */
    public function user(){
        return $this->BelongsTo(User::class);
    }
    
    /**
     * setAvatarAttribute
     *
     * @param  mixed $value
     * @return void
     */
    public function setAvatarAttribute($value){
        $extension=$value->extension();
        $this->attributes['avatar']=$value->storeAs('avatars',$this->user->id.'.'. $extension);
    }
}
