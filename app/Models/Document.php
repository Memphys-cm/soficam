<?php

namespace App\Models;

use App\Models\Sales\Sale;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Document extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function sale()
    {
        return $this->belongsTo(Sale::class);
    }
}
