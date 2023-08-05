<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class TitreFoncier extends Model
{
    use HasFactory, SoftDeletes;

    public $guarded = [];

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'titrefoncier_user', 'user_id', 'titre_foncier_id')->withTimestamps();
    }
    public function region(): BelongsTo
    {
        return $this->belongsTo(Region::class);
    }
    public function sales()
    {
        return $this->hasMany(Sale::class);
    }
    public function division(): BelongsTo
    {
        return $this->belongsTo(Division::class);
    }
    public function subDivision(): BelongsTo
    {
        return $this->belongsTo(SubDivision::class);
    }

}
