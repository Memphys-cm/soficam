<?php

namespace App\Models\Registration;

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

    public function housing_estate(): BelongsTo
    {
        return $this->belongsTo(HousingEstate::class);
    }


}
