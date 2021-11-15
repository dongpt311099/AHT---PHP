<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrdersProducts extends Model
{
    protected $table = "orders_products";

    use HasFactory;

    protected $fillable = [
        'id_orders',
        'id_products',
        'quantity',
        'price'
    ];
}
