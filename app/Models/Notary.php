<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notary extends Model
{
    use HasFactory;
    protected $guarded = [];

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
