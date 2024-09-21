<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Land extends Model
{
    use HasFactory;
    protected $guarded = [];

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
                $q->where('name', 'like', '%' . $query . '%');
                $q->orWhere('market_value', 'like', '%' . $query . '%');
                $q->orWhereHas('subDivision', function ($q) use ($query) {
                    $q->where('sub_division_name_en', 'like', '%' . $query . '%');
                    $q->where('sub_division_name_fr', 'like', '%' . $query . '%');
                });
         });
    }

}
