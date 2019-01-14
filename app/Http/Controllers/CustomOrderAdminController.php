<?php

namespace App\Http\Controllers;

use App\Custom_order;
use Illuminate\Http\Request;
use App\Role;
use App\Product;
use Auth;
use App\User;
use App\Custom;
class CustomOrderAdminController extends Controller
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
            $customao = Custom_order::all();
            $customoNotif = Custom_order::where('status','0');
        $countoNotif=Custom_order::where('status',0)->get()->count();
        $countNotif=Custom::where('status',0)->get()->count();
        return view('customorderadmin.index',compact('customao','customoNotif','countoNotif','countNotif'));

        }elseif($user = Auth::user()){
        $customao = Custom_order::where('user_id',Auth::user()->id)->get();
        return view('customorderadmin.index',compact('customao'));

        }


    }

    public function notifikasii()
    {   
        $user = Auth::user();
        if($user->hasRole('admin')){
            $customao = Custom_order::all();
            $customoNotif = Custom_order::where('status','0')->get();
            $countNotif=Custom::where('status',0)->get()->count();
        $countoNotif=Custom_order::where('status',0)->get()->count();
        return view('notifikasicustom.index',compact('customao','customoNotif','countoNotif','countNotif'));

        
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
        return view('customorderadmin.create',compact('product','user'));
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
            'nama' => 'required|',
            'alamat' => 'required|',
            'no_tlp' => 'required|',
            'pengiriman' => 'required|',
            'jumlah_brg' => 'required|',
            'pembayaran' => 'required|',
            'ukuran' => 'required|',
            'product_id' => 'required|'
            
        ]);
        $customao = new custom;
        $customao->nama = Auth::user()->name;
        $customao->alamat = $request->alamat;
        $customao->no_tlp = $request->no_tlp;
        $customao->pengiriman = $request->pengiriman;
        $customao->jumlah_brg = $request->jumlah_brg;
        $customao->pembayaran = $request->pembayaran;
        $customao->ukuran = $request->ukuran;
        $customao->product_id = $request->product_id;
        $customao->user_id = Auth::user()->id;

        $customao->save();
        return redirect()->route('customorderadmin.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Custom  $customao
     * @return \Illuminate\Http\Response
     */
    public function show(Custom $customa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Custom  $customa
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customao = Custom_order::findOrFail($id);
        $product = Product::all();
        $selectedproduct = Custom_order::findOrFail($id)->product_id;
        
        return view('customorderadmin.edit',compact('customao','product','selectedproduct'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Custom  $customa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'nama' => 'required|',
            'alamat' => 'required|',
            'no_tlp' => 'required|',
            'pengiriman' => 'required|',
            'jumlah_brg' => 'required|',
            'pembayaran' => 'required|',
            'ukuran' => 'required|',
            'product_id' => 'required|'

        ]);
        $customao = Custom_order::findOrFail($id);
        $customao->nama = $request->nama;
        $customao->alamat = $request->alamat;
        $customao->no_tlp = $request->no_tlp;
        $customao->pengiriman = $request->pengiriman;
        $customao->jumlah_brg = $request->jumlah_brg;
        $customao->pembayaran = $request->pembayaran;
        $customao->ukuran = $request->ukuran;
        $customao->product_id = $request->product_id;
        $customao->user_id = Auth::user()->id;

        $customao->save();
        return redirect()->route('customorderadmin.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Custom  $customao
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customao = Custom_order::findOrFail($id);
        $customao->delete();
        return redirect()->route('customorderadmin.index');
    }

   public function Publish($id)
    {
        $customao = Custom_order::find($id);
        if ($customao->status === 1) {
            $customao->status = 0;
        } else {
            $customao->status= 1;
        }
        $customao->save();
        return redirect()->route('customorderadmin.index');
    }
}
