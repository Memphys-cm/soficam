<?php

namespace App\Models\Lotissements;

use App\Models\User;
use App\Models\Division;
use App\Models\TitreFoncier;
use App\Models\MembreDuCabinet;
use App\Models\Lotissements\Block;
use App\Models\Lotissement\Lotissement;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Parcel extends Model
{
    use HasFactory;

    public $guarded = [];

    public function scopeMutationTotale($query)
    {
        return $query->where('type_de_venter','mutation_totale');
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'parcel_user', 'user_id', 'parcel_id')->withTimestamps();
    }
    public function divisions() : HasMany
    {
        return $this->hasMany(Division::class);
    }

    public function block(): BelongsTo
    {
        return $this->belongsTo(Block::class);
    }

    public function titreFoncier(): BelongsTo
    {
        return $this->belongsTo(TitreFoncier::class);
    }

    public function lotissement(): BelongsTo
    {
        return $this->belongsTo(Lotissement::class);
    }

    public function geometre(): BelongsTo
    {
        return $this->belongsTo(MembreDuCabinet::class,'geometre_id');
    }

    public function notaire(): BelongsTo
    {
        return $this->belongsTo(MembreDuCabinet::class, 'notaire_id');
    }

}
