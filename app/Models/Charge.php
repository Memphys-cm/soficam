<?php

namespace App\Models;

use App\Models\TitreFoncier;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Charge extends Model
{
    use HasFactory;

    public function titrefoncier():BelongsTo {
        return $this->belongsTo(TitreFoncier::class);
    }

    public function getStatusStyle(): String
    {
        return match ($this->status) {
            'pending_payment' => 'secondary',
            'active' => 'success',
            'inative' => 'danger',
            NULL => ''
        };
    }
}
