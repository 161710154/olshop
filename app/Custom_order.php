<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Custom_order extends Model
{
    protected $table = 'custom_orders';
    protected $fillable = ['nama', 'alamat', 'no_tlp', 'pengiriman', 'jumlah_brg', 'pembayaran', 'ukuran', 'product_id', 'user_id'];
    public $timestamps = true;

   public function product()
    {
        return $this->belongsTo('App\Product','product_id');
    }
    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }
}
