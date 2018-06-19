<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Purchase;
use App\Item;
use App\Order;
use App\Summery;
use App\Sale;
use App\PurchaseInfo;
use Auth;
use DB;

class SummeryController extends Controller
{
    public function index(Request $request)
    {
    	$items = DB::table('items')
            ->join('purchases', 'items.id', '=', 'purchases.item_id')
            ->join('orders', 'items.id', '=', 'orders.item_id')
            ->select('items.*', 'purchases.*', 'orders.*')
            ->get();

            return view('admin.summery.datatable',['items'=>$items]);
    }

    public function daywise()
    {
        $datebase=Sale::latest();
        return view('admin.summery.daywise',compact('datebase'));
    }

    public function daybaseshow($id)
    {
        $showDetails=Sale::with('Order')->find($id);
        return view('admin.summery.daydetails',compact('showDetails'));
    }

    public function daywisereport(Request $request)
    {
        $total = Sale::sum('grandtotal');
        //dd($total);
        $datebase =Sale::whereDate('created_at', '=', $request->daytime)->get();
        //dd($date);
           return view('admin.summery.daywise',compact('datebase','total'));
    }

    public function monthwise()
    {
        $datebase=Sale::latest();
        return view('admin.summery.monthwise',compact('datebase'));
    }

    public function monthbaseshow($id){
        $showDetails=Sale::with('Order')->find($id);
        return view('admin.summery.monthdetails',compact('showDetails'));
    }

    public function monthwisereport(Request $request)
    {
        $datebase = Sale::whereMonth('created_at', '=', $request->month)->get();
        //dd($datebase);
           return view('admin.summery.monthwise',compact('datebase'));
    }

    public function mostsold(){
        $mostsolds=DB::table('orders')
                    ->select('*',DB::raw('SUM(price) as total'))
                    ->orderBy('price','max')
                    ->groupBy('item_name')
                    ->get();
                    
        return view('admin.summery.mostsold',['mostsolds'=>$mostsolds]);
        /*$mostsolds=Order::orderBy('price','max')->SUM('price') + SUM('oquantity')->groupBy('item_id')->get();*/

    }
}


/*$users = DB::table('users')
            ->join('contacts', 'users.id', '=', 'contacts.user_id')
            ->join('orders', 'users.id', '=', 'orders.user_id')
            ->select('users.*', 'contacts.phone', 'orders.price')
            ->get();*/