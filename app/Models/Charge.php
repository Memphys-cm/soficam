<?php

namespace App\Models;

use App\Models\TitreFoncier;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Charge extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $guarded = [];

    public function registerMediaConversions(Media $media = null): void
    {
        $this
            ->addMediaConversion('preview')
            ->fit(Manipulations::FIT_CROP, 300, 300)
            ->nonQueued();
    }

    public function titreFoncier():BelongsTo {
        return $this->belongsTo(TitreFoncier::class);
    }

    public function getEtatTFStyleAttribute(): String
    {
        return match ($this->type_charge) {
            'HYPOTHEQUE' => 'info',
            'DISPONIBLE' => 'success',
            'PRENOTE' => 'secondary',
            'SUSPENDU' => 'danger',
            NULL => ''
        };
    }
}