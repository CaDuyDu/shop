<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class gallary extends Model
{
    protected $table = 'gallary_images';
    protected $fillable = ['id','product_id','link','created_at','updated_at'];
}
