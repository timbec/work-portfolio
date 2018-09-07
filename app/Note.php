<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;

class Note extends Model
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
    'title',
    'body'
    ];

     /**
     * Link our Tag (also used for Post)
     */
    public function tags() {

        return $this->belongsToMany('App\Tag');

    }

}
