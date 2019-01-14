<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable = ['nama', 'deskripsi', 'gambar' ,'harga', 'slug','kategori_id'];
    public $timestamps = true;

     public function kategori()
    {
    	return $this->belongsTo('App\Kategori','kategori_id');
    }

    public function custom()
    {
    	return $this->hasMany('App\Custom','product_id');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

}
