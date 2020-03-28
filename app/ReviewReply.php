<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReviewReply extends Model
{
    protected $fillable = [
        'review_id',
        'author',
        'email',
        'photo',
        'is_active',
        'body'
    ];

    public function review()
    {
        return $this->belongsTo('App\Review');
    }
}
