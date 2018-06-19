<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    public function order(){
    	return $this->hasMany('App\Order');
    }
}
