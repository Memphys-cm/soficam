<?php

namespace App\Models;

use App\Models\Sales\Saleable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FakeCertificate extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function division(): BelongsTo
    {
        return $this->belongsTo(Division::class);
    }

    public function region(): BelongsTo
    {
        return $this->belongsTo(Region::class);
    }

    public function conservation() : BelongsTo 
    {
        return $this->belongsTo(Conservation::class);
        
    }

    public function saleable()
    {
        return $this->morphOne(Saleable::class, 'saleable');
    }

}
