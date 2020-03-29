<?php

namespace App;



use Cocur\Slugify\SlugifyInterface;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;


class Product extends Model
{
    protected $fillable = [
        'user_id',
        'category_id',
        'photo_id',
        'title',
        'details',
        'description',
        'price',
        'related_pics_ids',
        'related_video_links',
        'slug',
        'gender',
        'video_category_id',
        'age_range',
        'selected_product_goals'
    ];

    use SluggableScopeHelpers;
    use Sluggable;

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }



    public static function scopeSearch($query, $searchTerm)
    {
        return $query->where('title', 'like', '%' . $searchTerm . '%');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function photo()
    {
        return $this->belongsTo('App\Photo');
    }

    // public function related_photos()
    // {
    //     return $this->belongsToMany('App\Photo', 'related_pics_ids');
    // }

    public function reviews()
    {
        return $this->hasMany('App\Review');
    }

    public function getStarRating()
    {
        $count = $this->reviews()->count();
        if (empty($count)) {
            return 0;
        }
        $starCountSum = $this->reviews()->sum('rating');
        $average = $starCountSum / $count;

        return $average;
    }
}
