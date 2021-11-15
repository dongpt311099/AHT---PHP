<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $table = "orders";

    use HasFactory;

    protected $fillable = [
        'id_user',
        'name',
        'phone_number',
        'address',
        'city',
        'shipping',
        'sub_total',
        'status'
    ];
}
