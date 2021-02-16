<?php

namespace App\Rules;
use  Illuminate\Support\Str;

use Illuminate\Contracts\Validation\Rule;

class SlugChecker implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($model,$obj=null)
    {
       $this->slugModel=$model;
       $this->obj=$obj;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {   
        $valueSlug=Str::slug($value);
        $project=$this->slugModel::where('slug',$valueSlug);
        
        if($project->get()->count()>0){
            if($this->obj!=null){
              return  $project->first()->id==$this->obj->id;
            }else {
                return false;
            }
        }else{
            return true;
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Headline must be unique.';
    }
}
