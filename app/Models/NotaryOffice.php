<?php

namespace App\Models;

use App\Models\Notary;
use App\Models\Region;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class NotaryOffice extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function region(): BelongsTo
    {
        return $this->belongsTo(Region::class);
    }
    public function notaries(): HasMany
    {
        return $this->hasMany(Notary::class);
    }
    public static function search($query)
    {
        return empty($query) ?
            static::query() :
            static::query()
            ->where(function ($q) use ($query) {
                $q->where('office_name', 'like', '%' . $query . '%');
                $q->orWhere('description', 'like', '%' . $query . '%');
            });
    }
}
