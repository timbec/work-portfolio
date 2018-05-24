<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Post extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
         $tags = $this->tags;
         $tagArray = [];

         foreach($tags as $tag ) {
             array_push($tagArray, $tag->name);
         }

        return [
           'id' => $this->id,
           'title' => $this->title,
           'body' => $this->body,
           'slug' => $this->slug,
           'featured_image' => $this->photo->file,
           'excerpt' => $this->excerpt,
           'category' => $this->category->name,
           'keywords' => $tagArray
        ];
    }
}
