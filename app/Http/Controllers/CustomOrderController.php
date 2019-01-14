<?php

namespace App\Http\Controllers;

use App\Custom_order;
use Illuminate\Http\Request;
use App\Role;
use App\Product;
use Auth;
use App\User;

class CustomOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {   
        $user = Auth::user();
        if($user->hasRole('admin')){
            $customo = Custom_order::all();
        return view('customorder.index',compact('customo'));

        }elseif( $user = Auth::user()){
        $customo = Custom_order::where('user_id',Auth::user()->id)->get();
        return view('customorder.index',compact('customo'));
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::all();
        $product = Product::all();
        return view('customorder.create',compact('product','user'));
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
            'alamat' => 'required|',
            'no_tlp' => 'required|',
            'pengiriman' => 'required|',
            'jumlah_brg' => 'required|',
            'pembayaran' => 'required|',
            'ukuran' => 'required|',
            'product_id' => 'required|'
            
        ]);
        $customo = new Custom_order;
        $customo->nama = Auth::user()->name;
        $customo->alamat = $request->alamat;
        $customo->no_tlp = $request->no_tlp;
        $customo->pengiriman = $request->pengiriman;
        $customo->jumlah_brg = $request->jumlah_brg;
        $customo->pembayaran = $request->pembayaran;
        $customo->ukuran = $request->ukuran;
        $customo->product_id = $request->product_id;
        $customo->user_id = Auth::user()->id;

        $customo->save();
        return redirect()->route('customorder.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Custom  $customo
     * @return \Illuminate\Http\Response
     */
    public function show(Custom $customo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Custom  $customo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customo = Custom_order::findOrFail($id);
        $product = Product::all();
        $selectedProduct = Custom::findOrFail($id)->product_id;
        
        return view('customadmin.edit',compact('custom','product','selectedProduct'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Custom  $customo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Custom $customo)
    {
        $this->validate($request,[
            'alamat' => 'required|',
            'no_tlp' => 'required|',
            'pengiriman' => 'required|',
            'jumlah_brg' => 'required|',
            'pembayaran' => 'required|',
            'ukuran' => 'required|',
            'product_id' => 'required|'

        ]);
        $customo = Custom_order::findOrFail($id);
        $customo->nama = $request->nama;
        $customo->alamat = $request->alamat;
        $customo->no_tlp = $request->no_tlp;
        $customo->pengiriman = $request->pengiriman;
        $customo->jumlah_brg = $request->jumlah_brg;
        $customo->ukuran = $request->ukuran;
        $customo->pembayaran = $request->pembayaran;
        $customo->product_id = $request->product_id;
        $customo->user_id = Auth::user()->id;

        $customo->save();
        return redirect()->route('customorder.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Custom  $customo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customo = Custom_order::findOrFail($id);
        $customo->delete();
        return redirect()->route('customorder.index');
    }
}
