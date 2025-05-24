<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    const STATUS_NEW = 'Новый';
    const STATUS_COMPLETED = 'Выполнен';

    protected $fillable = [
        'fio', 
        'status', 
        'comment',
        'product_id',
        'final_price'
    ];
    
    protected $attributes = [
         'status' => self::STATUS_NEW
     ];

}
