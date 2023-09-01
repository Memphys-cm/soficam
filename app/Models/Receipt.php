<?php

namespace App\Models;

use App\Models\Sales\Sale;
use App\Models\Traits\HasUUID;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Receipt extends Model
{
    use HasFactory, HasUUID;

    protected $guarded = [];
    
    public function sale(): HasMany
    {
        return $this->belongsTo(Sale::class);
    }
}
