<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $table = 'products';

    public $fillable = [
        'id', 'name', 'price'
    ];

    public function orders()
    {
        return $this->hasMany(Order::class, 'product_id');
    }
}
