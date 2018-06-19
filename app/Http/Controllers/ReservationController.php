<?php

namespace App\Http\Controllers;
use App\Reservation;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

class ReservationController extends Controller
{
    public function reserve(Request $request){
    	$this->validate($request,[
    		'name'=>'required',
    		'phone'=>'required',
    		'email'=>'required',
    		'date_and_time'=>'required'
    	]);
    	$reservation=new Reservation();
        $reservation->name=$request->name;
    	/*$reservation->table_num=1;*/
    	$reservation->phone=$request->phone;
    	$reservation->email=$request->email;
    	$reservation->date_and_time=$request->date_and_time;
    	$reservation->message=$request->message;
    	$reservation->status=false;
    	$reservation->save();
    	
    	Toastr::success('Reservation request sent successfully, we will notify you shortly','Success',["positionClass" => "toast-top-right"]);
    	return redirect()->back();

    }
}
