<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contact;
use Brian2694\Toastr\Facades\Toastr;

class ContactAdminController extends Controller
{
    public function index()
    {
    	$contacts=Contact::all();
    	return view('admin.contact.datatable',compact('contacts'));
    }

    public function show($id){
    	$contact=Contact::find($id);
    	return view('admin.contact.show',compact('contact'));
    }

    public function destroy($id)
    {
    	Contact::find($id)->delete();
    	
    	return redirect()->back()->with('successMsg','Contact Message deleted successfully');
    }
}