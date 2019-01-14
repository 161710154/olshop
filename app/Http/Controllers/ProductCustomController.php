<?php

namespace App\Http\Controllers;

use App\Product_custom;
use App\Custom_order;
use File;
use App\Kategori;
use Illuminate\Http\Request;

class ProductCustomController extends Controller
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
        $productcustom = Product_custom::all();
        return view('productcustom.index',compact('productcustom'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = Kategori::all();
        return view('productcustom.create',compact('kategori'));
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
            'harga' => 'required|',
            'gambar' => 'required|',
            'kategori_id' => 'required|'
        ]);


        $productcustom = new product_custom;
        $productcustom->nama = $request->nama;
        $productcustom->deskripsi = $request->deskripsi;
        $productcustom->harga = $request->harga;
        $productcustom->gambar = $request->gambar;
        $productcustom->kategori_id = $request->kategori_id;

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $destinationPath = public_path().'/assets/images/avatar/';
            $filename = str_random(6).'_'.$file->getClientOriginalName();
            $uploadSuccess = $file->move($destinationPath, $filename);
            $productcustom->gambar = $filename;
        }
            $productcustom->save();
        return redirect()->route('productcustom.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $productcustom
     * @return \Illuminate\Http\Response
     */
    public function show(Product $productcustom)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $productcustom
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $productcustom = Product::findOrFail($id);
        $kategori = Kategori::all();
        $selectedKategori = Product::findOrFail($id)->kategori_id;
        
        return view('productcustom.edit',compact('productcustom','kategori','selectedKategori'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $productcustom
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'nama' => 'required|',
            'deskripsi' => 'required|',
            'harga' => 'required|',
            'gambar' => 'required|',
            'kategori_id' => 'required|'

        ]);
        $productcustom = Product::findOrFail($id);
        $productcustom->nama = $request->nama;
        $productcustom->deskripsi = $request->deskripsi;
        $productcustom->harga = $request->harga;
        $productcustom->gambar = $request->gambar;
        $productcustom->kategori_id = $request->kategori_id;

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $destinationPath = public_path().'/assets/images/avatar/';
            $filename = str_random(6).'_'.$file->getClientOriginalName();
            $uploadSuccess = $file->move($destinationPath, $filename);
        
        if ($productcustom->gambar) {
        $old_foto = $productcustom->gambar;
        $filepath = public_path() . DIRECTORY_SEPARATOR . '/images/avatar'
        . DIRECTORY_SEPARATOR . $productcustom->gambar;
            try {
            File::delete($filepath);
            } catch (FileNotFoundException $e) {
        // File sudah dihapus/tidak ada
            }
        }
        $productcustom->gambar = $filename;
}
        $productcustom->save();
        return redirect()->route('productcustom.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $productcustom
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $productcustom = Product::findOrFail($productcustom->id);
        if ($productcustom->gambar) {
            $old_gambar = $productcustom->gambar;
            $filepath = public_path() . DIRECTORY_SEPARATOR . 'assets/images/avatar/'
            . DIRECTORY_SEPARATOR . $productcustom->gambar;
            try {
            File::delete($filepath);
            } catch (FileNotFoundException $e) {
            // File sudah dihapus/tidak ada
            }
            }
            $productcustom->delete();
        return redirect()->route('productcustom.index');
    }
}
