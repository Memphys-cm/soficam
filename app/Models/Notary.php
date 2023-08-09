<?php

namespace App\Models;

use App\Models\NotaryOffice;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Notary extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function notaryOffice()
    {
        return $this->belongsTo(NotaryOffice::class);
    }
   
    public static function search($query)
    {
        return empty($query) ?
            static::query() :
            static::query()
            ->where(function ($q) use ($query) {
                $q->where('name', 'like', '%' . $query . '%');
                $q->orWhere('post', 'like', '%' . $query . '%');                
            });
    }
}
