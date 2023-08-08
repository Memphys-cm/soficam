<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Activite extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function category() : BelongsTo 
    {
        return $this->belongsTo(CategoryActivite::class,'category_activite_id');
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

    public function getValueStyleAttribute(): String
    {
        return match ($this->type_de_facturation) {
            'value' =>  $this->value. " FRS",
            'percentage' => $this->value . " %",
            'per_m2' => $this->value . " per M<sup>2</sup>",
            NULL => ''
        };
    }

    public static function search($query)
    {
        return empty($query) ? static::query() :
            static::query()
            ->where(function ($q) use ($query) {
                $q->where('nom_activite', 'like', '%' . $query . '%');
                $q->orWhere('type_de_facturation', 'like', '%' . $query . '%');
                $q->orWhere('value', 'like', '%' . $query . '%');
                $q->orWhereHas('category', function ($q) use ($query) {
                    $q->where('nom_category', 'like', '%' . $query . '%');
                    $q->orWhere('grand_section', 'like', '%' . $query . '%');
                });
            });
    }
}
