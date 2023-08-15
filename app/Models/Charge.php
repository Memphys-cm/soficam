<?php

namespace App\Models;

use App\Models\TitreFoncier;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Charge extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function titrefoncier():BelongsTo {
        return $this->belongsTo(TitreFoncier::class);
    }

    public function getStatusStyleAttribute() : String
    {
        return match ($this->statusMapping) {
             'active' => 'success',
             'inactive' => 'dander',
             'pending_payment' => 'secondary',
             NULL => ''
        };
    }
    public function getStatusTextAttribute(): String
    {
        return match ($this->statusMapping) {
            'active' => 'Active',
            'inactive' => 'Inactive',
            'pending_payment' => 'Pending Payment',
            NULL => ''
        };
    }
}
