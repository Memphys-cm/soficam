<?php

namespace App\Models;

use App\Models\Traits\HasUUID;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EtatCession extends Model
{
    use HasFactory, HasUUID;

    protected $guarded = [];    
    public function geometre() : BelongsTo
    {
        return $this->belongsTo(User::class , 'geometre_id');
    }

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class , 'user_id');
    }

    public function getStatusStyleAttribute(): String
    {
        return match ($this->status) {
            'paid' => 'success',
            'completed' => 'success',
            'cancelled' => 'danger',
            'pending_payment' => 'secondary',
            default => ''
        };
    }
    public function getStatusTextAttribute(): String
    {
        return match ($this->status) {
            'paid' => 'Paid',
            'cancelled' => 'Cancelled',
            'completed' => 'Completed',
            'pending_payment' => 'Pending Payment',
            default => ''
        };
    }

    public static function search($query)
    {
        return empty($query) ?
            static::query() :
            static::query()
            ->where(function ($q) use ($query) {
                $q->where('type_operation', 'like', '%' . $query . '%');
                $q->orWhere('status', 'like', '%' . $query . '%');
                $q->orWhere('type_personne', 'like', '%' . $query . '%');
                $q->orWhere('zone', 'like', '%' . $query . '%');
                $q->orWhereHas('user', function ($q) use ($query) {
                    $q->where('first_name', 'like', '%' . $query . '%');
                    $q->where('last_name', 'like', '%' . $query . '%');
                });
                $q->orWhereHas('geometre', function ($q) use ($query) {
                    $q->where('first_name', 'like', '%' . $query . '%');
                    $q->where('last_name', 'like', '%' . $query . '%');
                });
         });
    }
}
