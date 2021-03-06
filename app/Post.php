<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;

use GrahamCampbell\Markdown\Facades\Markdown;

class Post extends Model
{
    use Sluggable;
    use SluggableScopeHelpers;

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title',
                'onUpdate' => false
            ]
        ];
    }

    protected $fillable = [
        'category_id',
        'photo_id',
        'title',
        'body',
        'excerpt'
    ];

    public function getContentHtmlAttribute($value)
    {
        return $this->body ? Markdown::convertToHtml(e($this->body)) : NULL;
    }

    public function photo() {
        return $this->belongsTo('App\Photo');
    }

    public function category() {
        return $this->belongsTo('App\Category');
    }

    public function tags(){

       return $this->belongsToMany('App\Tag');

   }

}
