<?php

namespace App\Models;

use App\Models\Traits\HasUUID;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Service extends Model
{
    use HasFactory, SoftDeletes, HasUUID;

    public $guarded = [];

    public function scopeActive($query): Builder
    {
        return $query->where('status', 1);
    }


    public function getServiceNameAttribute(): String
    {
        return config('app.locale') == 'en' ? $this->service_name_en : $this->service_name_fr;
    }

    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }

    public function getStatusStyleAttribute() : String
    {
        return match ($this->status) {
             1 => 'success',
             0 => 'danger',
             NULL => ''
        };
    }
    public function getStatusTextAttribute() : String
    {
        return match ($this->status) {
             1 => 'Active',
             0 => 'Inactive',
             NULL => ''
        };
    }

    public static function search($query)
    {
        return empty($query) ?
            static::query() :
            static::query()
            ->where(function ($q) use ($query) {
                $q->where('service_name_en', 'like', '%' . $query . '%');
         });
    }
}
