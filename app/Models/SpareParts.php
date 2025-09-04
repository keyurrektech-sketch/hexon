<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SpareParts extends Model
{
    protected $fillable = ['name', 'type', 'size', 'weight', 'qty', 'minimum_qty', 'rate', 'unit'];
}
