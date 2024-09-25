<?php

namespace App\Models;

// use App\Models\Traits\HasUUID;

use App\Models\Sales\Sale;
use App\Models\Traits\HasUUID;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class ImmatriculationDirecte extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, HasUUID;

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

    public static function search($query)
    {
        return empty($query) ?
            static::query() :
            static::query()
            ->where(function ($q) use ($query) {
                $q->where('reference', 'like', '%' . $query . '%');
                $q->orWhere('localisation', 'like', '%' . $query . '%');                
                $q->orWhere('zone', 'like', '%' . $query . '%');             
                $q->orWhereHas('region', function ($q) use ($query) {
                    $q->where('region_name_en', 'like', '%' . $query . '%');
                    $q->where('region_name_fr', 'like', '%' . $query . '%');
                });
                $q->orWhereHas('division', function ($q) use ($query) {
                    $q->where('division_name_en', 'like', '%' . $query . '%');
                    $q->where('division_name_fr', 'like', '%' . $query . '%');
                });
                $q->orWhereHas('subDivision', function ($q) use ($query) {
                    $q->where('sub_division_name_en', 'like', '%' . $query . '%');
                    $q->where('sub_division_name_fr', 'like', '%' . $query . '%');
                });
                    $q->orWhereHas('users', function ($q) use ($query) {
                    $q->where('first_name', 'like', '%' . $query . '%');
                    $q->orWhere('last_name', 'like', '%' . $query . '%');
                }); 
         });
    }

}
