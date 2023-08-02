<?php

namespace App\Models\Sales;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    protected $guarded = [];

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
