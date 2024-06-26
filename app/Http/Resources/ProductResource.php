<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    public static $wrap = null;
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */


    public function toArray(Request $request): array
    {


        return [
            "id" => $this->id,
            "price" => $this->price,
            "name" => "{$this->name}  {$this->product_size->name}",
            "category" => "{$this->product_size->product_category->name}",
        ];
    }
    public function boot(): void
    {
        JsonResource::withoutWrapping();
    }
}
