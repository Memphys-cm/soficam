<?php

namespace App\Models;

use App\Models\Notary;
use App\Models\Region;
use App\Models\SubDivision;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cabinet extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'cabinets';

    public function scopeNotaire($query)
    {
        return $query->where('type_cabinet',  'notaire');
    }
    public function scopeGeometre($query)
    {
        return $query->where('type_cabinet',  'geometre');
    }

    public function region(): BelongsTo
    {
        return $this->belongsTo(Region::class);
    }

    public function division(): BelongsTo
    {
        return $this->belongsTo(Division::class);
    }

    public function SubDivision(): BelongsTo
    {
        return $this->belongsTo(SubDivision::class);
    }

    public function membres(): HasMany
    {
        return $this->hasMany(MembreDuCabinet::class);
    }

    public static function search($query)
    {
        return empty($query) ?
            static::query() :
            static::query()
            ->where(function ($q) use ($query) {
                $q->where('nom_cabinet', 'like', '%' . $query . '%');
                $q->orWhere('description', 'like', '%' . $query . '%');
            });
    }
}
