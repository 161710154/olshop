<?php

namespace App\Http\Controllers;

use App\Product;
use App\Custom;
use App\Custom_order;
use File;
use App\Kategori;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ProductController extends Controller
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
        $product = Product::all();
        $countNotif=Custom::where('status',0)->get()->count();
         $countoNotif=Custom_order::where('status',0)->get()->count();
        return view('product.index',compact('product', 'countNotif','countoNotif'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = Kategori::all();
        $countNotif=Custom::where('status',0)->get()->count();
        $countoNotif=Custom_order::where('status',0)->get()->count();
        return view('product.create',compact('kategori', 'countNotif', 'countoNotif'));
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
            'deskripsi' => 'required|',
            'gambar' => 'required|',
            'harga' => 'required|',
            'kategori_id' => 'required|'
        ]);


        $product = new product;
        $product->nama = $request->nama;
        $product->slug=str_slug($request->nama, '-');
        $product->deskripsi = $request->deskripsi;
        $product->gambar = $request->gambar;
        $product->harga = $request->harga;
        $product->kategori_id = $request->kategori_id;

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $destinationPath = public_path().'/assets/images/avatar/';
            $filename = str_random(6).'_'.$file->getClientOriginalName();
            $uploadSuccess = $file->move($destinationPath, $filename);
            $product->gambar = $filename;
        }
        
        $product->save();
        return redirect()->route('product.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $kategori = Kategori::all();
        $selectedKategori = Product::findOrFail($id)->kategori_id;
        $countNotif=Custom::where('status',0)->get()->count();
        $countoNotif=Custom_order::where('status',0)->get()->count();

        return view('product.edit',compact('product','kategori','selectedKategori','countNotif','countoNotif'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'nama' => 'required|',
            'deskripsi' => 'required|',
            'gambar' => 'required|',
            'harga' => 'required|',
            'kategori_id' => 'required|'

        ]);
        $product = Product::findOrFail($id);
        $product->nama = $request->nama;
        $product->slug=str_slug($request->nama, '-').'-'.str_random(6);
        $product->deskripsi = $request->deskripsi;
        $product->gambar = $request->gambar;
        $product->harga = $request->harga;
        $product->kategori_id = $request->kategori_id;

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $destinationPath = public_path().'/assets/images/avatar/';
            $filename = str_random(6).'_'.$file->getClientOriginalName();
            $uploadSuccess = $file->move($destinationPath, $filename);
        
        if ($product->gambar) {
        $old_foto = $product->gambar;
        $filepath = public_path() . DIRECTORY_SEPARATOR . '/images/avatar'
        . DIRECTORY_SEPARATOR . $product->gambar;
            try {
            File::delete($filepath);
            } catch (FileNotFoundException $e) {
        // File sudah dihapus/tidak ada
            }
        }
        $product->gambar = $filename;
}
        $product->save();
        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
     {
         $product = Product::findOrFail($id);
        if ($product->gambar) {
            $old_gambar = $product->gambar;
            $filepath = public_path() . DIRECTORY_SEPARATOR . 'assets/images/avatar/'
            . DIRECTORY_SEPARATOR . $product->gambar;
            try {
            File::delete($filepath);
            } catch (FileNotFoundException $e) {
            // File sudah dihapus/tidak ada
            }
            }
            $product->delete();
        return redirect()->route('product.index');
    }
    
}
