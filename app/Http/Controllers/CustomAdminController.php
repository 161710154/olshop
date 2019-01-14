<?php

namespace App\Http\Controllers;

use App\Custom;
use App\Custom_order;
use Illuminate\Http\Request;
use App\Role;
use App\Product;
use Auth;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
class CustomAdminController extends Controller
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
            $customa = Custom::all();
            $customNotif = Custom::where('status','0');
        $countNotif=Custom::where('status',0)->get()->count();
        $countoNotif=Custom_order::where('status',0)->get()->count();
        return view('customadmin.index',compact('customa','customNotif','countNotif','countoNotif'));

        }elseif($user = Auth::user()){
        $customa = Custom::where('user_id',Auth::user()->id)->get();
        return view('customadmin.index',compact('customa'));

        }


    }

    public function notifikasi()
    {   
        $user = Auth::user();
        if($user->hasRole('admin')){
            $customa = Custom::all();
            $customNotif = Custom::where('status','0')->get();
        $countNotif=Custom::where('status',0)->get()->count();
        return view('notifikasi.index',compact('customa','customNotif','countNotif'));

        
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
        return view('customadmin.create',compact('product','user'));
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
        $customa = new custom;
        $customa->nama = Auth::user()->name;
        $customa->alamat = $request->alamat;
        $customa->no_tlp = $request->no_tlp;
        $customa->pengiriman = $request->pengiriman;
        $customa->jumlah_brg = $request->jumlah_brg;
        $customa->pembayaran = $request->pembayaran;
        $customa->ukuran = $request->ukuran;
        $customa->product_id = $request->product_id;
        $customa->user_id = Auth::user()->id;

        $customa->save();
        return redirect()->route('customadmin.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Custom  $customa
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
        $customa = Custom::findOrFail($id);
        $product = Product::all();
        $selectedproduct = Custom::findOrFail($id)->product_id;
        
        return view('customadmin.edit',compact('customa','product','selectedproduct'));

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
        $customa = Custom::findOrFail($id);
        $customa->nama = $request->nama;
        $customa->alamat = $request->alamat;
        $customa->no_tlp = $request->no_tlp;
        $customa->pengiriman = $request->pengiriman;
        $customa->jumlah_brg = $request->jumlah_brg;
        $customa->pembayaran = $request->pembayaran;
        $customa->ukuran = $request->ukuran;
        $customa->product_id = $request->product_id;
        $customa->user_id = Auth::user()->id;

        $customa->save();
        return redirect()->route('customadmin.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Custom  $customa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customa = Custom::findOrFail($id);
        $customa->delete();
        return redirect()->route('customadmin.index');
    }

   public function Publish($id)
    {
        $customa = Custom::find($id);
        if ($customa->status === 1) {
            $customa->status = 0;
        } else {
            $customa->status= 1;
        }
        $customa->save();
        return redirect()->route('customadmin.index');
    }
}