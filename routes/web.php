<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
      return view('frontend.index');
 });
    Route::get('profile', function () {
    	return view('frontend.profile');
});
	Route::get('customorder', function () {
    	return view('frontend.customorder');
});
    Route::get('rekapp', function () {
        return view('rekap.index');
});
//     Route::get('/custom', function () {
//     	return view('frontend.custom');
// });
//  	
//      Route::get('/product-detail', function () {
//         return view('frontend.product-detail');
// });

    Route::get('login', function () {
    	return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix'=>'admin', 'middleware'=>['auth']], function () { 

    Route::resource('/product','ProductController');
    Route::resource('/productcustom','ProductCustomController');
    Route::resource('/kategori','KategoriController');
    Route::resource('/customadmin','CustomAdminController');
    Route::get('/notifikasi','CustomAdminController@notifikasi')->name('notifikasi');
    Route::post('/custom/{publish}', 'CustomAdminController@Publish')->name('custom.publish');

    Route::resource('/customorderadmin','CustomOrderAdminController');
    Route::get('/notifikasicustom','CustomOrderAdminController@notifikasii')->name('notifikasicustom');
    Route::post('/customo/{publish}', 'CustomOrderAdminController@Publish')->name('customo.publish');
     Route::get('/rekap','CustomController@rekap_admin')->name('rekap');

});

Route::group(['prefix'=> 'admin', 'middleware'=>['auth', 'role:member|membercustom|admin']],
function()	{
	Route::resource('/custom','CustomController');
	Route::resource('/customorder','CustomOrderController');
});
// Route::get('kategori/{kategori}', 'FrontendController@kategoriproduct');
Route::get('/','FrontendController@product_index')->name('product_index');
Route::get('/customi','CustomController@index_admin')->name('index_admin');
Route::get('/product_kategori/{id}','FrontendController@filter_product');
Route::get('/product_kategori_index/{id}','FrontendController@filter_product_index');
Route::get('/productcustom/{id}','FrontendController@filter_product_custom');
Route::get('/product','FrontendController@product')->name('product');
Route::get('/product_index','FrontendController@product_index')->name('product_index');
Route::get('/product_custom','FrontendController@product_custom')->name('product_custom');
Route::get('/custom/{product}','FrontendController@custom')->name('custom')->middleware('auth');
Route::get('/produk/{product}','FrontendController@single_blog')->name('single_blog');
Route::get('/produk1/{product}','FrontendController@single_blog_product')->name('single_blog_product');
Route::get('auth/verify/{token}', 'Auth\RegisterController@verify');
Route::get('/rekap/{id} ','CustomController@rekap')->name('rekap');
Route::get('/rekapadmin','CustomController@rekap_admin')->name('rekapadmin');

Route::group(['middleware'=>'auth'],function(){
    Route::get('/add-cart/{product_id}', function($product_id){
        // $produk = \App\Product::find($product_id);
        $exist = \App\Cart::where('user_id', \Auth::user()->id)->where('product_id',$product_id)->first();
        if($exist){
            $exist->jumlah_brg = $exist->jumlah_brg + 1;
            $exist->save(); 
        }else{    
            $data = new \App\Cart;
            $data->product_id = $product_id;
            $data->jumlah_brg = 1;
            $data->user_id = \Auth::user()->id;
            $data->save();
       
        }
        return redirect()->back();
    });    

    Route::get('cart/{usr_id}', function ($usr_id) {
        $cart = \App\Cart::where('user_id', $usr_id)->get();
        return view('frontend.cart', compact('cart'));
    });

    Route::get('cart/delete/{id}', function ($id) {
        $cart = \App\Cart::find($id)->delete();
        return redirect()->back();
    });

    Route::post('cart/edit/{user_id}', function ( \Illuminate\Http\Request $request, $user_id) {
        for($i = 0; $i < count($request->id); $i++){
            $cart = \App\Cart::find($request->id[$i]);
            $cart->jumlah_brg = $request->jumlah_brg[$i];
            $cart->save();
        }

        return redirect()->back();
    });
    Route::post('checkout/{user_id}',function( \Illuminate\Http\Request $request, $user_id){
        $request->validate([
            'alamat' => 'required|',
            'no_tlp' => 'required|',
            'pengiriman' => 'required|',
            'pembayaran' => 'required|',
        ]);
        // dd(json_decode($request->chart));
        foreach(json_decode($request->chart) as $data){

            $custom = new \App\custom;
            $custom->nama = \Auth::user()->name;
            $custom->alamat = $request->alamat;
            $custom->no_tlp = $request->no_tlp;
            $custom->pengiriman = $request->pengiriman;
            $custom->jumlah_brg = $data->jumlah_brg;
            $custom->pembayaran = $request->pembayaran;
            $custom->product_id = $data->product_id;
            $custom->user_id = \Auth::user()->id;

            $custom->save();
        }

        $del = \App\Cart::where('user_id', $user_id)->delete();

        return redirect()->back();
    });
});
