<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    function product()
    {
        return $this->hasMany(Product::class);
    }
    // use SoftDeletes;
    protected $fillable = ['name', 'logo'];
    // function products()
    // {

    //     return $this->hasMany(Products::class);
    // }
}
