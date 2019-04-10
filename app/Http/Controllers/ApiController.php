<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;
use App\Custom;
use App\Kategori;

class ApiController extends Controller
{
    function product(){
    	return response()->json(\App\Product::with('kategori')->get(),200);
    }
    function kategori(){
    	return response()->json(\App\Kategori::all(),200);
    }
    function custom(){
    	return response()->json(\App\Custom::with('kategori','product')->get(),200);
    }
}
