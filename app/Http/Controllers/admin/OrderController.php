<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;
use App\Category;
use App\Item;
use App\Table;
use App\Sale;
use Auth;


class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders=Order::orderBy('created_at','desc')->get();
        return view('admin.order.ordertable',compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::all();
        $items=Item::all();
        $tables=Table::all();
        return view('admin.order.createdata',compact('categories','items','tables'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
         $sale=new Sale();
         $sale->payment_type=$request->payment_type;
         //return ($sale->payment_type);
         $sale->total=$request->grandtotal;
         $sale->discount=$request->discount;
         $sale->grandtotal=$request->aftergrandTotal;
    
       $sale->save();
    

        $items=$request->itemid;
        $name=$request->name;
        $quan=$request->quan;
        $total=$request->total;
        /*$count=0;
        foreach ($items as $i) {
        $order=new Order();
        $order->item_id=$i;

        $order->table_num=$request->table_num;

        $order->item_name=$name[$count];

        $order->quantity=$quan[$count];

        $order->price=$total[$count];

        $order->save();
        ++$count;
        }*/
       for($i=0;$i<count($items);$i++){ 
            $order = new Order();
            $order->sale_id = $sale->id;
            $order->item_id = $items[$i];
            $order->table_num=$request->table_num;
            $order->item_name=$name[$i];
            $order->oquantity=$quan[$i];
            $order->price=$total[$i];
           //$abc=$order->oquantity;
            
            $item=Item::find($items[$i]);
            $ssd=$name[$i];
            $abc=$item->quantity;
            $item->quantity =$item->quantity-$quan[$i];
            if($item->quantity < $quan[$i] ){
                //stop saling items
              
                echo ($ssd." has only ".$abc. " numbers of quantity");
              
                
               
                return;
                
           }
            
            $order->save();
            $item->save(); 
            //echo ('Order Confirmed');
            //return;

        
            /*$saleinfo->discount_percent = 0;
            $saleinfo->item_cost_price = $salecps[$i];
            $saleinfo->item_unit_price = $saleups[$i];
            $saleinfo->total = $saleTotals[$i];   */   
           // return $saleinfo;
            
           // $order->save();
             //$sale->Sale_info()->save($saleinfo);
            //$sale->order()->save($order);
            
       }
       echo ('Order Confirmed');
       //return $sale->id;
      
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    public function itemOrder(Request $request)
    {
       /* $search=$request->order;*/
        $ordereditems = Item::where('name','like','%'.$request->search.'%')->get();
        $tables=Table::all();
       
         $items = "";
        if($ordereditems){
            foreach($ordereditems as $key=>$search){
                $items.='<tr class="ordereditems" id="ordered">'. 
                    '<td class="hidden itemid" >'.$search->id.'</td>'.
                    '<td class="iname" name="name">'.$search->name.'</td>'.
                    '<td class="hidden price" name="price">'.$search->price.'</td>'.
                    '<td class="hidden itemquantity">'.$search->quantity.'</td>'.
                    '<input class="quantiy" type="number" value="1" name="quantity">'. 
                     '</tr>';
                                   
        }
            
        return $items; 
       
    }

   /* return view('admin.table.createdata',compact)*/
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Order::find($id)->delete();
        return redirect()->route('order.index')->with('successMsg','Order Deleted Successfully');
    }
}
