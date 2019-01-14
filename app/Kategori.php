<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'kategoris';
    protected $fillable = ['nama_kategoris'];
    public $timestamps = true;

    public function product()
    {
    	return $this->hasMany('App\Product','kategori_id');
    }
}
