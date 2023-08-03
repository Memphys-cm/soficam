<?php

namespace App\Models\Registration;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Parcel extends Model
{
    use HasFactory;

    public $guarded = [];

    public function divisions() : HasMany
    {
        return $this->hasMany(Division::class);
    }

    public function block(): BelongsTo
    {
        return $this->belongsTo(Block::class);
    }

}
