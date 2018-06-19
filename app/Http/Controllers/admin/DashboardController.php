<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Item;
use App\TableContent;
use App\Reservation;
use App\Table;
use App\Contact;

class DashboardController extends Controller
{
    //
    public function index(){
    	$categoryCount=Category::count();
    	$itemCount=Item::count();
    	$sliderCount=TableContent::count();
    	$reservations=Reservation::where('status',false)->get();
    	$contactCount=Contact::count();
        $tables=Table::all();
    	//return $categoryCount;
    	return view('admin.dashboard',compact('categoryCount','itemCount','sliderCount','reservations','contactCount','tables'));
    }
}
