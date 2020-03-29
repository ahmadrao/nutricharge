<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{

    protected $fillable = ['video_category_id', 'name', 'link'];


    public function category()
    {
        return $this->belongsTo('App\VideoCategory', 'video_category_id', 'id');
    }
}
