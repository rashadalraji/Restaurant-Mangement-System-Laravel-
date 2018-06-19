<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Employee;
use Carbon\Carbon;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees=Employee::all();
        return view('admin.employee.datatable',compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.employee.createdata');
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
            'employee_id'=>'required',
            'first_name'=>'required',
            'last_name'=>'required',
            'image'=>'required|mimes:jpeg,jpg,bitmap,bmp,png',
            'designation'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'gender'=>'required',
            'present_address'=>'required',
            'permanent_address'=>'required'

        ]);

        $image=$request->file('image');
        $slug=str_slug($request->name);

        if(isset($image))
        {
            $currentDate=Carbon::now()->toDateString();
            $imagename=$slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();

            if(!file_exists('uploads/employee'))
            {
                mkdir('uploads/employee',0777,true);
            }
            $image->move('uploads/employee',$imagename);
        }else
        {
            $imagename="default.png";
        }

        $employee=new Employee();
        $employee->employee_id=$request->employee_id;
        $employee->first_name=$request->first_name;
        $employee->last_name=$request->last_name;
        $employee->image= $imagename;
        $employee->designation=$request->designation;
        $employee->email=$request->email;
        $employee->phone=$request->phone;
        $employee->gender=$request->gender;
        $employee->joining_date=$request->joining_date;
        $employee->resignation_date=$request->resignation_date;
        $employee->present_address=$request->present_address;
        $employee->permanent_address=$request->permanent_address;
        $employee->save();

        return redirect()->route('employee.index')->with('successMsg','Employee Information Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee=Employee::find($id);
        return view('admin.employee.show',compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $employee=Employee::find($id);
        return view('admin.employee.editdata',compact('employee'));
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
            'employee_id'=>'required',
            'first_name'=>'required',
            'last_name'=>'required',
            'image'=>'mimes:jpeg,jpg,bitmap,bmp,png',
            'designation'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'gender'=>'required',
            'present_address'=>'required',
            'permanent_address'=>'required'

        ]);
        $employee=Employee::find($id);
        $image=$request->file('image');
        $slug=str_slug($request->name);

        if(isset($image))
        {
            $currentDate=Carbon::now()->toDateString();
            $imagename=$slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();

            if(!file_exists('uploads/employee'))
            {
                mkdir('uploads/employee',0777,true);
            }
            if(file_exists('uploads/employee/'.$employee->image))
            {
            unlink('uploads/employee/'.$employee->image);
            }
            $image->move('uploads/employee',$imagename);
        }else
        {
            $imagename=$employee->image;
        }
        $employee->employee_id=$request->employee_id;
        $employee->first_name=$request->first_name;
        $employee->last_name=$request->last_name;
        $employee->image= $imagename;
        $employee->designation=$request->designation;
        $employee->email=$request->email;
        $employee->phone=$request->phone;
        $employee->gender=$request->gender;
        $employee->joining_date=$request->joining_date;
        $employee->resignation_date=$request->resignation_date;
        $employee->present_address=$request->present_address;
        $employee->permanent_address=$request->permanent_address;
        $employee->save();

        return redirect()->route('employee.index')->with('successMsg','Employee Information Updated Successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Employee::find($id)->delete();
        return redirect()->route('employee.index')->with('successMsg','Employee Information Deleted Successfully');
    }
}
