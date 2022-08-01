<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $fillable=['categories_id','p_name','p_code','p_color','description','price','image'];

    public function category(){

        return $this->belongsTo('App\Category');

    }
    public function attributes(){
        return $this->hasMany('App\ProductAtrr');
    }

//    public function reviews(){
//        return $this->hasMany('App\Review');
//    }
}
