<?php

namespace App\Models;

use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use App\Models\Registration\HousingEstate;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TitreFoncier extends Model implements HasMedia
{
    use HasFactory, SoftDeletes, InteractsWithMedia;

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
        return $this->belongsToMany(User::class, 'titrefoncier_user', 'user_id', 'titre_foncier_id')->withTimestamps();
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
    public function housing_estate() : HasMany
    {
        return $this->hasMany(HousingEstate::class);
    }

    public function getEtatTFStyleAttribute(): String
    {
        return match ($this->etat_TF) {
            'HYPOTHEQUE' => 'info',
            'DISPONIBLE' => 'success',
            'PRENOTE' => 'secondary',
            'SUSPENDU' => 'danger',
            NULL => ''
        };
    }
}
