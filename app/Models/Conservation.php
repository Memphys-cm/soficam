<?php

namespace App\Models;

use App\Models\Traits\HasUUID;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Conservation extends Model
{
    use HasFactory, SoftDeletes, HasUUID;

    public function scopeActive($query): Builder
    {
        return $query->where('status', 1);
    }


    public function getConservationNameAttribute(): String
    {
        return config('app.locale') == 'en' ? $this->conservation_name_en : $this->conservation_name_fr;
    }

    public function getStatusStyleAttribute(): String
    {
        return match ($this->status) {
            1 => 'success',
            0 => 'danger',
            NULL => ''
        };
    }
    public function getStatusTextAttribute(): String
    {
        return match ($this->status) {
            1 => 'Active',
            0 => 'Inactive',
            NULL => ''
        };
    }

    public function division(): BelongsTo
    {
        return $this->belongsTo(Division::class);
    }

    public function region(): BelongsTo
    {
        return $this->belongsTo(Region::class);
    }

    public function conservaion() : BelongsTo 
    {
        return $this->belongsTo(Conservation::class);
        
    }


    public static function search($query)
    {
        return empty($query) ?
            static::query() :
            static::query()
            ->where(function ($q) use ($query) {
                $q->where('conservation_name_en', 'like', '%' . $query . '%');
                $q->orWhere('conservation_name_fr', 'like', '%' . $query . '%');
                $q->orWhereHas('division', function ($q) use ($query) {
                    $q->where('division_name_en', 'like', '%' . $query . '%');
                    $q->where('division_name_fr', 'like', '%' . $query . '%');
                });
         });
    }
}
