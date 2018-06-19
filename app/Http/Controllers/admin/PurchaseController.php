<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Item;
use App\Table;
use App\Purchase;
use App\Supplier;
use App\PurchaseInfo;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
    {
        $purchases=Purchase::all();
        return view('admin.purchase.purchasetable',compact('purchases'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $items=Item::all();
        $suppliers=Supplier::all();
        return view('admin.purchase.createdata',compact('items','suppliers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $purchaseinfo=new PurchaseInfo();
        $purchaseinfo->supplier_id=$request->supplierid;
        $purchaseinfo->payment_type=$request->payment_type;
         //return ($purchaseinfo->payment_type);
        $purchaseinfo->grandtotal=$request->grandtotal;

        if($purchaseinfo->save()){
       

        $items=$request->itemid;
        $name=$request->name;
        $quan=$request->quan;
        $total=$request->total;
        //$count=0;
    //     foreach ($item as $i) {
    //     $purchase=new Purchase();
    //     $purchase->item_id=$i;

       

    //     $purchase->item_name=$name[$count];

    //     $purchase->description=$request->description;

    //     $purchase->quantity=$quan[$count];

    //     $purchase->total=$total[$count];
    
    //     $purchase->save();
    //     ++$count;
    // }

        
       

         for($i=0;$i<count($items);$i++){ 
            $purchase = new Purchase();
            $purchase->purchase_id=$purchaseinfo->id;
            $purchase->item_id = $items[$i];
            $purchase->description=$request->description;
            
            $purchase->item_name=$name[$i];
            
            $purchase->pquantity=$quan[$i];
            $purchase->total=$total[$i];
           
            $purchase->save();
            $item=Item::find($items[$i]);
            $item->quantity =$item->quantity+$quan[$i];
            if($item->quantity < $quan[$i] ){
                //stop saling items
                /*return confirm("No item to sale");*/
                //return false;
            }
            $item->save();  
            
            
        }
        }


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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function itemPurchase(Request $request)
    {
       /* $search=$request->order;*/
        $ordereditems = Item::where('name','like','%'.$request->search.'%')->get();

       
         $items = "";
        if($ordereditems){
            foreach($ordereditems as $key=>$search){
                $items.='<tr class="ordereditems" id="ordered">'. 
                    '<td class="hidden itemid" >'.$search->id.'</td>'.
                    '<td class="iname" name="name">'.$search->name.'</td>'.
                    '<td class="hidden price" name="price">'.$search->unit_price.'</td>'.
                    '<input class="quantiy" type="number" value="1" name="quantity">'. 
                     '</tr>';
                                     
        }
            
       return $items;
    }

   /* return view('admin.table.createdata',compact)*/
}

}
