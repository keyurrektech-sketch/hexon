<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NewPurchaseOrder extends Model
{
    protected $fillable = [
        'order_number',
        'supplier_name',
        'order_date',
        'status',
    ];
}
