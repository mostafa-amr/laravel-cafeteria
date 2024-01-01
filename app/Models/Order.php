<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'totalPrice',
        'comment',
        'user_id',
    ];
    function user()
    {
        return $this->belongsTo(User::class);
    }
    function product()
    {
        return $this->belongsToMany(Product::class, 'product_order', 'order_id', 'product_id');
    }
}
