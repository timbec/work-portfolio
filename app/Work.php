<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;

class Work extends Model
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
    'work_category_id',
    'photo_id',
    'title',
    'website_link',
    'body',
    'description'
    ];

    /**
     * Link our photo thumbnail
     */
    public function photo() {
        return $this->belongsTo('App\Photo');
    }

    /**
     * Link our Work Category
     */
    public function work_category(){
         return $this->belongsTo('App\WorkCategory');
     }

     /**
     * Link our Tag (also used for Post)
     */
      public function tags(){

          return $this->belongsToMany('App\Tag');

      }

}
