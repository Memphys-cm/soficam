<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class ImmatriculationDirecte extends Model
{
    use HasFactory;

    public $guarded = [];
    
    public function registerMediaConversions(Media $media = null): void
    {
        $this
            ->addMediaConversion('preview')
            ->fit(Manipulations::FIT_CROP, 300, 300)
            ->nonQueued();
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'immatriculation_directe_user', 'user_id', 'immatriculation_directe_id')->withTimestamps();
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

     public function region(): BelongsTo
    {
        return $this->belongsTo(Region::class);
    }
    public function sales(): HasMany
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
