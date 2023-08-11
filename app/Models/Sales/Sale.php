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
                $q->where('sale_amount', 'like', '%' . $query . '%');
                $q->orWhere('sales_code', 'like', '%' . $query . '%');
                $q->orWhere('sale_type', 'like', '%' . $query . '%');
                
            });
    }
}
