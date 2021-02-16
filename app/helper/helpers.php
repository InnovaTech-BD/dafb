<?php
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

function currentPath(){
   return url()->current();
}

function stringMaker($request,$field){
   $array=[];
   foreach($request->all() as $key=>$item){
      $split=explode('_',$key);
      if(isset($split[1])){
         if($split[1]==$field){
            $array[$split[0]]=$item;
         }
      }
   }
   return json_encode($array);
}