<?php

namespace App\Models\Lotissements;

use App\Models\Lotissements\Parcel;
use App\Models\TitreFoncier;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Lotissement extends Model
{
    use HasFactory;

    public $guarded = [];

    public function blocks() : HasMany
    {
        return $this->hasMany(Block::class);
    }

    public function titreFoncier() : BelongsTo
    {
        return $this->belongsTo(TitreFoncier::class , 'titre_foncier_id');
    }

    public function parcels() : HasMany
    {
        return $this->belongsTo(Parcel::class);
    }

}
