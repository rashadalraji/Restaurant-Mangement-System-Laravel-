<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TableContent;
use App\Category;
use App\Item;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
       $sliders=TableContent::all();
       $categories=Category::all();
       $items=Item::all();
       return view('frontpage',compact('sliders','categories','items'));
    }
}
