<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Discount_code extends Model
{
    protected $table = "discount_code";
    public function users(){
    	return $this->belongsTo('App\User','user_id','id');
    }
}
