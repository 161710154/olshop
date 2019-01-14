<?php

namespace App\Http\Controllers;

use App\Custom;
use Illuminate\Http\Request;
use App\Role;
use App\Product;
use Auth;
use App\User;

class CustomController extends Controller
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
            $custom = Custom::all();
        return view('custom.index',compact('custom'));

        }elseif( $user = Auth::user()){
        $custom = Custom::where('user_id',Auth::user()->id)->get();
        $countNotif=Custom::where('status',0)->get()->count();
        return view('custom.index',compact('custom','countNotif'));
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
        return view('custom.create',compact('product','user'));
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
            'product_id' => 'required|'
            
        ]);
        $custom = new custom;
        $custom->nama = Auth::user()->name;
        $custom->alamat = $request->alamat;
        $custom->no_tlp = $request->no_tlp;
        $custom->pengiriman = $request->pengiriman;
        $custom->jumlah_brg = $request->jumlah_brg;
        $custom->pembayaran = $request->pembayaran;
        $custom->product_id = $request->product_id;
        $custom->user_id = Auth::user()->id;

        $custom->save();
        return redirect()->route('custom.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Custom  $custom
     * @return \Illuminate\Http\Response
     */
    public function show(Custom $custom)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Custom  $custom
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $custom = Custom::findOrFail($id);
        $product = Product::all();
        $selectedProduct = Custom::findOrFail($id)->product_id;
        
        return view('customadmin.edit',compact('custom','product','selectedProduct'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Custom  $custom
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Custom $custom)
    {
        $this->validate($request,[
            'alamat' => 'required|',
            'no_tlp' => 'required|',
            'pengiriman' => 'required|',
            'jumlah_brg' => 'required|',
            'pembayaran' => 'required|',
            'product_id' => 'required|'

        ]);
        $custom = Custom::findOrFail($id);
        $custom->nama = Auth::user()->name;
        $custom->alamat = $request->alamat;
        $custom->no_tlp = $request->no_tlp;
        $custom->pengiriman = $request->pengiriman;
        $custom->jumlah_brg = $request->jumlah_brg;
        $custom->pembayaran = $request->pembayaran;
        $custom->product_id = $request->product_id;
        $custom->user_id = Auth::user()->id;

        $custom->save();
        return redirect()->route('custom.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Custom  $custom
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $custom = Custom::findOrFail($id);
        $custom->delete();
        return redirect()->route('custom.index');
    }

    public function rekap($id)
    {
        $custom = Custom::findOrFail($id);   
        return view('rekap.index',compact('custom'));  
    }

    public function rekap_admin($id)
    {
        $custom = Custom::findOrFail($id);   
        return view('rekap.index1',compact('custom'));  
    }
}