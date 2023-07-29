<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class categoriesresource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return[
            "id"=> $this->id,
            "image"=> asset('dashboard/images/categories/'.$this->image),
            "created_at"=> $this->created_at->format('d/m/Y'),
             "name"=>$this->name,
             "description"=>$this->description,

            ];
    }
}
