<?php

namespace App\Models;

use App\Models\Charge;
use App\Models\Traits\HasUUID;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia;
use App\Models\Lotissements\Parcel;
use Illuminate\Database\Eloquent\Model;
use App\Models\Registration\HousingEstate;
use App\Models\Sales\Sale;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class TitreFoncier extends Model implements HasMedia
{
    use HasFactory, SoftDeletes, InteractsWithMedia, HasUUID;

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

    public function certificatesProprietes(): HasMany
    {
        return $this->hasMany(CertificatePropriete::class);
    }

    public function etatCessionsPaid(): HasMany
    {
        return $this->hasMany(EtatCession::class)->where('status','paid');
    }

    public function parcels(): HasMany
    {
        return $this->hasMany(Parcel::class);
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
        return $this->belongsTo(SubDivision::class,'sub_division_id');
    }
    public function sub_division(): BelongsTo
    {
        return $this->belongsTo(SubDivision::class);
    }
    public function land(): BelongsTo
    {
        return $this->belongsTo(Land::class,'land_id');
    }

    public function charge(): HasMany
    {
        return $this->hasMany(Charge::class);
    }

    public function getEtatTFStyleAttribute(): String
    {
        return match ($this->etat_TF) {
            'HYPOTHEQUE' => 'info',
            'DISPONIBLE' => 'success',
            'PRENOTE' => 'secondary',
            'SUSPENDU' => 'danger',
            default => 'primary'
        };
    }
    public function getStatusTaxStyleAttribute(): String
    {
        return match ($this->status_tax) {
            'payer' => 'success',
            'non_payer' => 'danger',
            default => 'info'
        };
    }

    public static function search($query)
    {
        return empty($query) ?
            static::query() :
            static::query()
            ->where(function ($q) use ($query) {
                $q->where('etat_terrain', 'like', '%' . $query . '%');
                $q->orWhere('numero_titre_foncier', 'like', '%' . $query . '%');                
                $q->orWhere('zone', 'like', '%' . $query . '%');                
                $q->orWhere('etat_TF', 'like', '%' . $query . '%'); 
                $q->orWhere('status_tax', 'like', '%' . $query . '%'); 
                $q->orWhere('date_tax', 'like', '%' . $query . '%'); 
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
