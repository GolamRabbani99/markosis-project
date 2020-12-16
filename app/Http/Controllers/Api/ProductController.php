<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\productinfo;
use App\Http\Resources\ProductResource;

class ProductController extends Controller
{
    

    public function index(){
        return ProductResource::collection(productinfo::all());
    }
}
