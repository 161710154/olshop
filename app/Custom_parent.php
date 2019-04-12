<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Custom_parent extends Model
{
    protected $table = 'Custom_parent';
    protected $fillable = ['user_id'];
    // public $timestamps = true;
}
