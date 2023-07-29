<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubDivision extends Model
{
    use HasFactory, SoftDeletes;

    public function scopeActive($query): Builder
    {
        return $query->where('status', 1);
    }


    public function getSubDivisionNameAttribute(): String
    {
        return config('app.locale') == 'en' ? $this->sub_division_name_en : $this->sub_division_name_fr;
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

}
