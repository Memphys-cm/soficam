<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TitreFoncier extends Model
{
    use HasFactory;


    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'titrefoncier_user', 'user_id', 'titre_foncier_id')->withTimestamps();
    }
}
