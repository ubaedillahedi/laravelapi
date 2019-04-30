<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        'customer', 'star', 'review'
    ];

    public function reviews()
    {
        return $this->belongsTo(Product::class);
    }
}
