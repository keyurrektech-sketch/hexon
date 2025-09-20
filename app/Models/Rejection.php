<?php

namespace App\Models;

use App\Models\SpareParts;
use Illuminate\Database\Eloquent\Model;

class Rejection extends Model
{
    protected $fillable = [
        'parts',
        'qty',
        'reason',
    ];
    public function sparePart()
    {
        return $this->belongsTo(SpareParts::class);
    }
}
