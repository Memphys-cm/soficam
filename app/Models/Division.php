<?php

namespace App\Models;

use PhpParser\Node\Expr\Cast\String_;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Division extends Model
{
    use HasFactory, SoftDeletes;

    public $guarded = [];

    public function scopeActive($query): Builder
    {
        return $query->where('status',1);
    }

    public function getDivisionNameAttribute(): String
    {
        return config('app.locale') == 'en' ? $this->division_name_en : $this->division_name_fr;
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

    public function region(): BelongsTo
    {
        return $this->belongsTo(Region::class);
    }

    public function subDivisions() : HasMany 
    {
        return $this->hasMany(SubDivision::class);
        
    }

    public static function search($query)
    {
        return empty($query) ?
            static::query() :
            static::query()
            ->where(function ($q) use ($query) {
                $q->where('division_name_en', 'like', '%' . $query . '%');
                $q->orWhere('division_name_fr', 'like', '%' . $query . '%');
                $q->orWhereHas('subDivision', function ($q) use ($query) {
                    $q->where('sub_division_name_en', 'like', '%' . $query . '%');
                    $q->where('sub_division_name_fr', 'like', '%' . $query . '%');
                });
                $q->orWhereHas('region', function ($q) use ($query) {
                    $q->where('region_name_en', 'like', '%' . $query . '%');
                    $q->where('region_name_fr', 'like', '%' . $query . '%');
                });
         });
    }
}
