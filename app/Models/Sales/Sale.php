<?php

namespace App\Models\Sales;

use App\Models\User;
use App\Models\Document;
use App\Models\TitreFoncier;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sale extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function titreFoncier()
    {
        return $this->belongsTo(TitreFoncier::class, 'titre_foncier_id');
    }
    public function saleables()
    {
        return $this->hasMany(Saleable::class, 'sale_id');
    }

    public function documents()
    {
        return $this->hasMany(Document::class);
    }

    protected $casts = [
        'document_path' => 'array',
    ];

    public static function search($query)
    {
        return empty($query) ?
            static::query() :
            static::query()
            ->where(function ($q) use ($query) {
                $q->where('sales_amount', 'like', '%' . $query . '%');
                $q->orWhere('sales_code', 'like', '%' . $query . '%');
                $q->orWhere('sales_type', 'like', '%' . $query . '%');
                
            });
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
    public function getStatusTextAttribute(): String
    {
        return match ($this->status) {
            'active' => 'Active',
            'expired' => 'Expired',
            'pending_payment' => 'Pending Payment',
            NULL => ''
        };
    }
}
