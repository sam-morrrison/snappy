<?php

namespace App\Http\Resources;

use App\Models\Property;
use Illuminate\Http\Resources\Json\JsonResource;

class Paginator extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $totalProperties =  Property::count();
        $totalPages = ceil($totalProperties / request('perPage', 50));

        return [
            'totalProperties' => $totalProperties,
            'totalPages' => $totalPages,
            'current_page' => (int) request('pageNo', 1),
            'per_page' => (int) request('perPage'),
            'properties' => $this->resource
        ];
    }
}
