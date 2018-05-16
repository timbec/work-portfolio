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
        return [
           'title' => $this->title,
           'body' => $this->body,
           'slug' => $this->slug,
           'featured_image' => $this->photo->file,
           'excerpt' => $this->excerpt,
           'category' => $this->category,
           'tags' => $this->tags
        ];
    }
}
