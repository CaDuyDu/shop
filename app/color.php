<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class color extends Model
{
    protected $table = 'colors';
    protected $fillable = ['id', 'color','code','created_at','updated_at'];

    public function product(){
    	return $this->hasMany('App\Product','color_id','id');
    }
}
