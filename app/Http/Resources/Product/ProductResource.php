<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            'name' => $this->name,
            'description' => $this->detail,
            'price' => $this->price,
            'stock' => $this->stock,
            'discountPrice' => round($this->price - ($this->price * $this->discount/100)),
            'rating' => round($this->reviews->sum('rating') / $this->reviews->count(), 1),
            'discount' => $this->discount,
//            'reviews' => $this->reviews,
        ];
    }
}
