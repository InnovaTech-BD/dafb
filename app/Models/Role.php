<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

 //
 protected $guarded=['id'];

 //get roles
 static function getAllRoles(){
     return self::all();
 }
 
 /**
  * rolePaginate
  *
  * @param  mixed $number
  * @return void
  */
 static function rolePaginate($number){
     return self::paginate($number);
 }
 
 /**
  * permissions
  *
  * @return void
  */
 public function permissions(){
     return $this->belongsToMany(permission::class);
 }

 
 /**
  * createPermissions
  *
  * @param  mixed $request
  * @return void
  */
 public function createPermissions($request){
     $this->permissions()->sync($request->permissions);
     
 }
 
 /**
  * hasPermission
  *
  * @param  mixed $permission
  * @return void
  */
 public function hasPermission($permission){
      if($this->permissions->where('slug',$permission)->first()){
          return true;
      }

  }   
  /**
   * hasPermissions
   *
   * @param  mixed $permissions
   * @return void
   */
  public function hasPermissions($permissions){
      if (is_array($permissions)){
          foreach($permissions as $permission){
              $this->hasPermission($permission);
          }
      }else{
          $this->hasAbility($permissions);
      }
  }
}

