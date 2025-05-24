<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'category_id',
        'description',
        'price'
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

}
