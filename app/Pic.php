<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pic extends Model
{
    protected $fillable = ['file'];

    protected $uploads = '/images/';

    public function getFileAttribute($pic)
    {
        return $this->uploads . $pic;
    }
}
