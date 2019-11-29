<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }

    protected $table = 'products';

    protected $fillable = ['name', 'detail', 'price', 'stock', 'discount'];
}
