<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    //
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }

    protected $table = 'reviews';

    protected $fillable = ['product_id', 'customer_id', 'review', 'rating'];
}
