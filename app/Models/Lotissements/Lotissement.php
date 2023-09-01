<?php

namespace App\Models\Lotissements;

use App\Models\TitreFoncier;
use App\Models\Traits\HasUUID;
use App\Models\Lotissements\Parcel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Lotissement extends Model
{
    use HasFactory, HasUUID;

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
        return $this->hasMany(Parcel::class);
    }

    public static function search($query)
    {
        return empty($query) ?
            static::query() :
            static::query()
            ->where(function ($q) use ($query) {
                $q->whereHas('titreFoncier', function ($q) use ($query) {
                    $q->where('numero_titre_foncier', 'like', '%' . $query . '%');
                });
         });
    }

}
