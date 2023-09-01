<?php

namespace App\Models;

use App\Models\Traits\HasUUID;
use Spatie\Image\Manipulations;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class ImmatriculationDirecte extends Model implements HasMedia
{
    use HasFactory, HasUUID, InteractsWithMedia;

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
