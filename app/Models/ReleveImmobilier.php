<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ReleveImmobilier extends Model
{
    use HasFactory;


    protected $guarded = []; 

    public function scopeActive($query): Builder
    {
        return $query->where('status', 'pending_payment');
    }

    public function requestor(): BelongsTo
    {
        return $this->belongsTo(User::class,'requestor_id');
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

    public static function search($query)
    {
        return empty($query) ?
            static::query() :
            static::query()
            ->where(function ($q) use ($query) {
                $q->where('releves_number', 'like', '%' . $query . '%');                
                $q->orWhere('price', 'like', '%' . $query . '%');                
                $q->orWhere('validity', 'like', '%' . $query . '%');                
                $q->orWhere('releves_type', 'like', '%' . $query . '%');                
                $q->orWhere('status', 'like', '%' . $query . '%');                
                $q->orWhere('recorded_by', 'like', '%' . $query . '%');
                $q->orWhereHas('requestor', function ($q) use ($query) {
                $q->where('first_name', 'like', '%' . $query . '%');
                $q->orWhere('last_name', 'like', '%' . $query . '%');
            }); 
         });
    }


}
