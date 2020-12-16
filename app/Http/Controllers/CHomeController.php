<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
// use App\Models\productinfo;
use App\Models\User;


class CHomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        
    }
    public function index1()
    {
         return view('product');
       
// $products = productinfo::all();
        // return view('home');
    }
}
