<?php

namespace App\Http\Controllers\admin;

use App\Notifications\ReservationConfirmed;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Reservation;
use App\Table;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Notification;

class ReservationAdminController extends Controller
{
    public function index(Request $request)
    {
    	$reservations=Reservation::all();
        $tables=Table::all();
    	return view('admin.reservation.datatable',compact('reservations','tables'));
    }

    public function create()
    {
        $reservations=Reservation::all();
        $tables=Table::all();
        return view('admin.reservation.createdata',compact('reservations','tables'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'table_num'=>'required',
            'phone'=>'required',
            'email'=>'required',
            'date_and_time'=>'required'
        ]);
        $reservation=new Reservation();
        $reservation->name=$request->name;
        $reservation->table_num=$request->table_num;
        $reservation->phone=$request->phone;
        $reservation->email=$request->email;
        $reservation->date_and_time=$request->date_and_time;
        $reservation->message=$request->message;
        $reservation->status=false;
        $reservation->save();
        
        return redirect()->route('reservation.index')->with('successMsg','Reservation Created');
    }

    public function status($id)
    {
    	$reservation=Reservation::find($id);
    	$reservation->status=true;
    	$reservation->save();
        Notification::route('mail', $reservation->email)
            ->notify(new ReservationConfirmed());

    	
    	return redirect()->back()->with('successMsg','Reservation request confirmed successfully');
    }


    public function edit($id)
    {
        $reservation=Reservation::find($id);
        $tables=Table::all();
        return view('admin.reservation.editdata',compact('reservation','tables'));
    }

    public function update(Request $request,$id)
    {
        $this->validate($request,[
         'table_num'=>'required',
         'name'=>'required',
         'phone'=>'required',
         'date_and_time'=>'required'

        ]);

        $reservation=Reservation::find($id);

        $reservation->table_num=$request->table_num;
        $reservation->name=$request->name;
        $reservation->phone=$request->phone;
        $reservation->email=$request->email;
        $reservation->date_and_time=$request->date_and_time;
        $reservation->message=$request->message;
        $reservation->save();

        return redirect()->route('reservation.index')->with('successMsg','Reservation Successfully Confirmed');
    }
    

    public function destroy($id)
    {
    	Reservation::find($id)->delete();
    	
    	return redirect()->back()->with('successMsg','Reservation request deleted successfully');

    }
}
