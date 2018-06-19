<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
  public function tables(){
  	return $this->belongsTo('App\Table');
  }
}
