<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class ImmatriculationDirecte extends Model
{
    use HasFactory;

    public $guarded = [];
    
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'immatriculation_directe_user', 'user_id', 'immatriculation_directe_id')->withTimestamps();
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }


}
