<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public $table = 'customers';

    public $fillable = [
        'id', 'name', 'phone'
    ];

    public function orders()
    {
        return $this->hasMany(Order::class, 'customer_id');
    }
}
