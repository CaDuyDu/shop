<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\color;
use App\provider;
use App\Kind;
use App\Product;
use App\sizes;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable = ['id','provider_id','origin_prime','name','sale_prime','description','content','color_id','size_id','slug','created_at','updated_at']; 
     public function provider(){
    	return $this->belongsTo('App\provider','provider_id','id');
    }
     public function color(){
    	return $this->belongsTo('App\color','color_id','id');
    }
   
}
