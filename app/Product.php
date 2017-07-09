<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    
    protected $dates = ['deleted_at'];
    protected $table = 'products';
    
    public function photos()
    {
        return $this->hasMany('App\Photo');
    }
    
    public function store()
    {
        return $this->belongsTo('App\Store');
    }
    
    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }
}
