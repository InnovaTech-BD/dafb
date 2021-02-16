<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    /**
     * role
     *
     * @return void
     */
    public function role(){
        return $this->belongsTo(Role::class);
    }
    
    /**
     * isSuperAdmin
     *
     * @return void
     */
    public function isSuperAdmin(){
        if($this->role->slug=='super-admin'){
            return true;
        }
    }

    
    /**
     * hasRole
     *
     * @param  mixed $value
     * @return void
     */
    public function hasRole($value){
        
        if ($this->role->slug==$value){
            return true;
        }
    }
    
    /**
     * hasPermission
     *
     * @param  mixed $value
     * @return void
     */
    public function hasPermission($value){
        
        return $this->role->hasPermission($value);
    }

    //relations
    
    /**
     * profile
     *
     * @return void
     */
    public function profile(){
        return $this->hasOne(Profile::class);
    }

    //Mutator
    
    /**
     * setPasswordAttribute
     *
     * @param  mixed $value
     * @return void
     */
    public function setPasswordAttribute($value){
        $this->attributes['password']=HASH::make($value);
    }



}
