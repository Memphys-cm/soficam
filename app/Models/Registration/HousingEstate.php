<?php

namespace App\Models\Registration;

use App\Models\TitreFoncier;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HousingEstate extends Model
{
    use HasFactory;

    public $guarded = [];

    public function blocks() : HasMany
    {
        return $this->hasMany(Block::class);
    }

    public function land_title() : BelongsTo
    {
        return $this->belongsTo(TitreFoncier::class , 'land_id');
    }

}
