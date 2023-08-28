<?php

namespace App\Models;

use App\Models\Sales\Sale;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Receipt extends Model
{
    use HasFactory;

    protected $guarded = [];
    
    public function sale(): HasMany
    {
        return $this->belongsTo(Sale::class);
    }
}
