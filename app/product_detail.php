<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product_detail extends Model
{
    protected $table = 'product_detail';
    protected $fillbale = ['id','product_id','color_id','size_id','quantity','created_at','updated_at'];
}
