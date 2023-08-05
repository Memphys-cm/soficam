<?php

namespace App\Models\Sales;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Saleable extends Model
{
    use HasFactory;
    protected $table = 'saleables';
    protected $guarded = [];
    
    public function sale()
    {
        return $this->belongsTo(Sale::class, 'sale_id');
    }
}
