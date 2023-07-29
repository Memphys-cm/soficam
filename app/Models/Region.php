<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Region extends Model
{
    use HasFactory, SoftDeletes;

    public $guarded = [];

    public function scopeActive($query): Builder
    {
        return $query->where('status', 1);
    }

    public function getRegionNameAttribute() : String
    {
        return config('app.locale') == 'en' ? $this->region_name_en : $this->region_name_fr;
    }

    public function divisions() : HasMany
    {
        return $this->hasMany(Division::class);
    }
}
