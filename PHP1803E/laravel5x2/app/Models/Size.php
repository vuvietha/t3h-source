<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    protected $table = "sizes";

    //tao moi quan he voi model product
    public function products(){
    	//tao moi quan he one to many
    	return $this->hasMany('App\Models\Product');

    }
}
