<?php

namespace App\Models;

use App\Models\Cabinet;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MembreDuCabinet extends Model
{
    use HasFactory;
    protected $table = 'membre_du_cabinets';

    protected $guarded = [];

    public function cabinet()
    {
        return $this->belongsTo(Cabinet::class,'cabinet_id');
    }
   
    public static function search($query)
    {
        return empty($query) ?
            static::query() :
            static::query()
            ->where(function ($q) use ($query) {
                $q->where('first_name', 'like', '%' . $query . '%');
                $q->orWhere('last_name', 'like', '%' . $query . '%');
                $q->orWhere('phone_number', 'like', '%' . $query . '%');
                $q->orWhere('address', 'like', '%' . $query . '%');
                $q->orWhere('post', 'like', '%' . $query . '%');                
            });
    }
}
