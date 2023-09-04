<?php

namespace App\Models;

use App\Models\TitreFoncier;
use App\Models\Traits\HasUUID;
use App\Models\MembreDuCabinet;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia;
use App\Models\Lotissements\Parcel;
use Illuminate\Database\Eloquent\Model;
use App\Models\Lotissements\Lotissement;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Operation extends Model implements  HasMedia
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

    public function scopeRetraitIndivision($query)
    {
        return $query->where('type_operation', 'retrait_indivision_normale')->orWhere('type_operation', 'retrait_indivision_forcee');
    }
    public function scopeMutationTotale($query)
    {
        return $query->where('type_operation', 'mutation_totale_normale')->orWhere('type_operation', 'mutation_totale_par_deces');
    }
    public function scopeMorcellements($query)
    {
        return $query->where('type_operation', 'morcellement_normale')->orWhere('type_operation', 'morcellement_forcee');
    }

    public function parcels(): BelongsToMany
    {
        return $this->belongsToMany(Parcel::class, 'parcel_operation', 'parcel_id', 'operation_id')->withTimestamps();
    }

    public function titreFoncier(): BelongsTo
    {
        return $this->belongsTo(TitreFoncier::class);
    }
    
    public function geometre(): BelongsTo
    {
        return $this->belongsTo(MembreDuCabinet::class, 'geometre_id','id');
    }

    public function notaire(): BelongsTo
    {
        return $this->belongsTo(MembreDuCabinet::class,'notaire_id');
    }

    public function conservateur(): BelongsTo
    {
        return $this->belongsTo(User::class, 'conservateur_id');
    }

    public function lotissement(): BelongsTo
    {
        return $this->belongsTo(Lotissement::class);
    }

    public function sales(): HasMany
    {
        return $this->hasMany(Sale::class);
    }

    public function getTypeOperationStyleAttribute(): String
    {
        return match ($this->type_operation) {
            'mutation_totale_normale' => 'info',
            'mutation_totale_par_deces' => 'primary',
            'morcellement_normale' =>'secondary',
            'morcellement_forcee' => 'tertiary',
            'retrait_indivision_normale' => 'dark',
            'retrait_indivision_forcee' => 'success', 
            NULL => ''
        };
    }
    public function getTypeOperationTextAttribute(): String
    {
        return match ($this->type_operation) {
            'mutation_totale_normale' => 'Mutation Totale',
            'mutation_totale_par_deces' => 'Mutation Par Deces',
            'morcellement_normale' => 'Morcellement',
            'morcellement_forcee' => 'Morcellement Force',
            'retrait_indivision_normale' => 'Retrait D\'indivision',
            'retrait_indivision_forcee' => 'Retrait D\'indivision Forcee',
            NULL => ''
        };
    }

    public function getGeometreStatusStyleAttribute(): String
    {
        return match ($this->statut_geometre) {
            'ongoing' => 'secondary',
            'pending_payment' => 'secondary',
            'completed', =>'success',
            'pending' => 'tertiary',  
            NULL => ''
        };
    }
   
    public function getNotaireStatusStyleAttribute(): String
    {
        return match ($this->statut_notaire) {
            'ongoing' => 'secondary',
            'completed', =>'success',
            'pending' => 'tertiary',  
            NULL => ''
        };
    }
   
    public function getConservateurStatusStyleAttribute(): String
    {
        return match ($this->statut_conservateur) {
            'ongoing' => 'secondary',
            'pending_payment' => 'secondary',
            'completed', =>'success',
            'pending' => 'tertiary',  
            NULL => ''
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
