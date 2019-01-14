<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product_custom extends Model
{
    protected $table = 'product_customs';
    protected $fillable = ['nama', 'deskripsi', 'harga' ,'gambar' , 'kategori_id'];
    public $timestamps = true;

     public function kategori()
    {
    	return $this->belongsTo('App\Kategori','kategori_id');
    }

    public function custom_order()
    {
    	return $this->hasMany('App\Custom_order','product_id');
    }
}
