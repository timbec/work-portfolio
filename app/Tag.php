<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
     protected $fillable = ['name'];


    public function posts()
    {
        return $this->belongsToMany('App\Post');
    }

    public function works()
    {

        return $this->belongsToMany('App\Work');

    }
    
    public function notes()
    {

        return $this->belongsToMany('App\Note');

    }

    public function getRouteKeyName(){

        return 'name';

    }
}
