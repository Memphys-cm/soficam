<?php

namespace App\Models\Sales;

use App\Models\Document;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sale extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function saleables()
    {
        return $this->hasMany(Saleable::class, 'sale_id');
    }

    public function documents()
    {
        return $this->hasMany(Document::class);
    }

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
}
