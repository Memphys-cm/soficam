<?php

namespace App\Models\Lotissements;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Block extends Model
{
    use HasFactory;

    public $guarded = [];

    public function parcels() : HasMany
    {
        return $this->hasMany(Parcel::class);
    }

    public function lotissement(): BelongsTo
    {
        return $this->belongsTo(Lotissement::class,'lotissement_id');
    }

}
