<?php

namespace App\Http\Resources;

use App\Models\Genre;
use Illuminate\Http\Resources\Json\JsonResource;

class MovieResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [    
            'id' => $this->id,        
            'name' => $this->name,
            'status' => $this->status,
            'poster' => $this->poster,
            'genres' => GenreResource::collection($this->genres),
        ];
    }
}
