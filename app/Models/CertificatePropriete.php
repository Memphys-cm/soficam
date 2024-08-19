<?php

namespace App\Models;

use App\Models\Sales\Sale;
use App\Models\Traits\HasUUID;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CertificatePropriete extends Model
{
    use HasFactory, HasUUID;

    protected $guarded = [];

    protected $casts = [
        'validity' => 'date'
    ];

    public function scopeActive($query): Builder
    {
        return $query->where('status', 'pending_payment');
    }

    public function requestor(): BelongsTo
    {
        return $this->belongsTo(User::class,'requestor_id');
    }

    public function getStatusStyleAttribute() : String
    {
        return match ($this->status) {
             'active' => 'success',
             'expired' => 'danger',
             'pending_payment' => 'secondary',
             'pending_extract' => 'secondary',
             NULL => ''
        };
    }
    public function getStatusTextAttribute(): String
    {
        return match ($this->status) {
            'active' => 'Active',
            'pending_extract' => 'Pending Extract',
            'expired' => 'Expired',
            'pending_payment' => 'Pending Payment',
            NULL => ''
        };
    }

    public function titreFoncier()
    {
        return $this->belongsTo(TitreFoncier::class, 'titre_foncier_id');
    }

    // public function sale()
    // {
    //     return $this->belongsTo(Sale::class);
    // }

    public static function search($query)
    {
        return empty($query) ?
            static::query() :
            static::query()
            ->where(function ($q) use ($query) {
                $q->where('titre_foncier_id', 'like', '%' . $query . '%');
                $q->orWhere('certificate_proprietes_number', 'like', '%' . $query . '%');
                $q->orWhere('price', 'like', '%' . $query . '%');
                $q->orWhere('validity', 'like', '%' . $query . '%');
                $q->orWhere('certificate_proprietes_type', 'like', '%' . $query . '%');
                $q->orWhere('status', 'like', '%' . $query . '%');
                $q->orWhere('recorded_by', 'like', '%' . $query . '%');
                $q->orWhereHas('titreFoncier', function ($q) use ($query) {
                    $q->where('numero_titre_foncier', 'like', '%' . $query . '%');
                });
                $q->orWhereHas('requestor', function ($q) use ($query) {
                $q->where('first_name', 'like', '%' . $query . '%');
                $q->orWhere('last_name', 'like', '%' . $query . '%');
            });
         });
    }
}
