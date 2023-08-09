<?php

namespace App\Models\CertificatPropriete;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Demandecp extends Model
{
    use HasFactory;

    protected $guarded = [];
    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
    public function getStatusStyleAttribute() : String
    {
        return match ($this->status) {
             'waiting' => 'info',
             'rejected' => 'danger',
             'accepted' => 'success',
             NULL => ''
        };
    }
    public function getStatusTextAttribute() : String
    {
        return match ($this->status) {
            'waiting' => 'waiting',
            'rejected' => 'rejected',
            'accepted' => 'accepted',
             NULL => ''
        };
    }
    public static function search($query)
    {
        return empty($query) ?
            static::query() :
            static::query()
            ->where(function ($q) use ($query) {
                $q->where('reason', 'like', '%' . $query . '%');
                $q->orWhere('purchaser_name', 'like', '%' . $query . '%');                
                $q->orWhere('land_owner', 'like', '%' . $query . '%');                
                $q->orWhere('status', 'like', '%' . $query . '%');                
            });
    }
}
