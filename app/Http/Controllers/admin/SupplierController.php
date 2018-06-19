<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Supplier;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suppliers=Supplier::all();
        return view('admin.supplier.datatable',compact('suppliers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.supplier.createdata');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'first_name'=>'required',
            'last_name'=>'required',
            'phone_number'=>'required',
            'email'=>'required',
            'present_addr'=>'required',
            'permanent_addr'=>'required',
            'account_number'=>'required',
            'account_type'=>'required',
            'company_name'=>'required'
             ]);

        $supplier=new Supplier();
        $supplier->first_name=$request->first_name;
        /*$supplier->table_num=1;*/
        $supplier->last_name=$request->last_name;
        $supplier->phone_number=$request->phone_number;
        $supplier->email=$request->email;
        $supplier->present_addr=$request->present_addr;
        $supplier->permanent_addr=$request->permanent_addr;
        $supplier->account_number=$request->account_number;
        $supplier->account_type=$request->account_type;
        $supplier->company_name=$request->company_name;
        
        $supplier->save();
        
        return redirect()->route('supplier.index')->with('successMsg','Supplier Information Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $supplier=Supplier::find($id);
        return view('admin.supplier.show',compact('supplier'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $supplier=Supplier::find($id);
        return view('admin.supplier.editdata',compact('supplier'));
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
        $this->validate($request,[
            'first_name'=>'required',
            'last_name'=>'required',
            'phone_number'=>'required',
            'email'=>'required',
            'present_addr'=>'required',
            'permanent_addr'=>'required',
            'account_number'=>'required',
            'account_type'=>'required',
            'company_name'=>'required'
             ]);

        $supplier=Supplier::find($id);
        $supplier->first_name=$request->first_name;
        /*$supplier->table_num=1;*/
        $supplier->last_name=$request->last_name;
        $supplier->phone_number=$request->phone_number;
        $supplier->email=$request->email;
        $supplier->present_addr=$request->present_addr;
        $supplier->permanent_addr=$request->permanent_addr;
        $supplier->account_number=$request->account_number;
        $supplier->account_type=$request->account_type;
        $supplier->company_name=$request->company_name;
        
        $supplier->save();

        return redirect()->route('supplier.index')->with('successMsg','Supplier Information Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Supplier::find($id)->delete();
         return redirect()->route('supplier.index')->with('successMsg','Supplier Information Deleted Successfully');
    }
}
