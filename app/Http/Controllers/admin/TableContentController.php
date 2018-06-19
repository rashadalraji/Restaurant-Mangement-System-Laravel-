<?php

namespace App\Http\Controllers\admin;
use App\TableContent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class TableContentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tables=TableContent::all();
        return view('admin.table.datatable',compact('tables'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.table.createdata');
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
            'title'=>'required',
            'sub_title'=>'required',
            'image'=>'required|mimes:jpeg,jpg,bitmap,png,bmp'
        ]);
        $image=$request->file('image');
        $slug=str_slug($request->title);
        if(isset($image)){
            $currentDate=Carbon::now()->toDateString();
        $imagename=$slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();

            if(!file_exists('uploads/table')){
                mkdir('uploads/table',0777,true);
             }
             $image->move('uploads/table',$imagename);
        }else{
            $imagename='default.png';
        }

        $tablecontent=new TableContent();
        $tablecontent->title=$request->title;
        $tablecontent->sub_title=$request->sub_title;
        $tablecontent->image=$imagename;

        $tablecontent->save();
        return redirect()->route('table.index')->with('successMsg','Data saved successfully');
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
        $tablecontent=TableContent::find($id);
        return view('admin.table.editdata',compact('tablecontent'));
        
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
            'title'=>'required',
            'sub_title'=>'required',
            'image'=>'mimes:jpeg,jpg,bitmap,png,bmp'
        ]);
        $image=$request->file('image');
        $slug=str_slug($request->title);
        $tablecontent=TableContent::find($id);
        if(isset($image)){
            $currentDate=Carbon::now()->toDateString();
        $imagename=$slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();

            if(!file_exists('uploads/table')){
                mkdir('uploads/table',0777,true);
             }
             unlink('uploads/table/'.$tablecontent->image);
             $image->move('uploads/table',$imagename);
        }else{
            $imagename=$tablecontent->image;
        }

        
        $tablecontent->title=$request->title;
        $tablecontent->sub_title=$request->sub_title;
        $tablecontent->image=$imagename;

        $tablecontent->save();
        return redirect()->route('table.index')->with('successMsg','Data Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tablecontent=TableContent::find($id);
        if(file_exists('uploads/table/'.$tablecontent->image))
        {
        unlink('uploads/table/'.$tablecontent->image);
        }
        $tablecontent->delete();
        return redirect()->back()->with('successMsg','Data deleted successfully');
    }
}
