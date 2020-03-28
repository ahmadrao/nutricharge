<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        'product_id',
        'description',
        'email',
        'author',
        'is_active',
        'headline',
        'rating'
    ];

    public function product() 
    {
        return $this->belongsTo('App\Product');
    }

    public function replies()
    {
        return $this->hasMany('App\ReviewReply');
    }
}
