<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    protected $guarded = [];

    public function category(){
        return $this->belongsToMany('App\Category');
    }

    public function image(){
        return $this->belongsTo('App\Image');
    }
}
