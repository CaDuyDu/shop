<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sizes extends Model
{
    protected $table = 'sizes';
    protected $fillable = ['id', 'size'];
    
}
