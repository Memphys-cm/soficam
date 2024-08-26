<?php

namespace App\Models;

use App\Models\Traits\HasUUID;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Region extends Model
{
    use HasFactory, SoftDeletes, HasUUID;

    public $guarded = [];

    public function scopeActive($query): Builder
    {
        return $query->where('status', 1);
    }

    public function getRegionNameAttribute() : String
    {
        return config('app.locale') == 'en' ? $this->region_name_en : $this->region_name_fr;
    }

    public function titreFonciers()
    {
        return $this->hasMany(TitreFoncier::class);
    }

    public static function search($query)
    {
        return empty($query) ?
            static::query() :
            static::query()
            ->where(function ($q) use ($query) {
                $q->where('code', 'like', '%' . $query . '%');
                $q->orWhere('region_name_en', 'like', '%' . $query . '%');
            });
    }

    public function divisions() : HasMany
    {
        return $this->hasMany(Division::class);
    }
}
