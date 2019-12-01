<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\Resource;
use Illuminate\Support\Str;

class ProductCollection extends Resource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'name' => $this->name,
            'description' => Str::limit($this->detail, 100),
            'price' => $this->price,
            'discountPrice' => round($this->price - ($this->price * $this->discount/100)),
            'rating' => $this->reviews->count() > 0 ? round($this->reviews->sum('rating') / $this->reviews->count(), 1) : Null,
            'href' => [
                'link' => route('products.show', $this->id)
            ]
        ];
    }
}
