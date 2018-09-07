<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Tag; 

class NoteSingle extends JsonResource
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
          'id' => $this->id,
          'title' => $this->title,
          'body' => $this->body,
          'slug' => $this->slug,
          'featured_image' => $this->photo->file,
          'tags' => $this->tags
      ];
    }
}
