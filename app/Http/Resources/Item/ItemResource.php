<?php

namespace App\Http\Resources\Item;

use Illuminate\Http\Resources\Json\JsonResource;

class ItemResource extends JsonResource
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
            'item.id' => $this->id,
            'item.name' => $this->name,
            'item.completed' => $this->completed,
            'item.completed_at' => $this->completed_at,
         
        ];
    }
}
