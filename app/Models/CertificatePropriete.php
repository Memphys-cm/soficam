<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CertificatePropriete extends Model
{
    use HasFactory;

    protected $guarded = []; 

    public function scopeActive($query): Builder
    {
        return $query->where('status', 'pending_payment');
    }


    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }

    public function getStatusStyleAttribute() : String
    {
        return match ($this->status) {
             'active' => 'success',
             'expired' => 'danger',
             'pending_payment' => 'secondary',
             NULL => ''
        };
    }

    public function titreFoncier()
    {
        return $this->belongsTo(TitreFoncier::class, 'titre_foncier_id');
    }
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
            });
    }
    public function getStatusTextAttribute() : String
    {
        return match ($this->status) {
            'active' => 'active',
            'expired' => 'expired',
            'pending_payment' => 'pending_payment',
             NULL => ''
        };
    }
}
