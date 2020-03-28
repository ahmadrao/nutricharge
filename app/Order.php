<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['name', 'email', 'address', 'phone_number', 'product_id'];

    public function product()
    {
        return $this->belongsTo('App\Product');
    }
}
