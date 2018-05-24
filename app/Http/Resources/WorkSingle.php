<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Tag; 
use App\Category;

class WorkSingle extends JsonResource
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
          'description' => $this->description,
          'slug' => $this->slug,
          'featured_image' => $this->photo->file,
          'work_category' => $this->work_category->name,
          'tags' => $this->tags
      ];
    }
}
