<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
   public function reservation()
   {
    	return $this->hasOne('App\Reservation');
   }
   public function orders()
   {
   	return $this->hasMany('App\Order');
   }
}
