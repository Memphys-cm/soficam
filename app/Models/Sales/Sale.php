<?php

namespace App\Models\Sales;

use App\Models\User;
use App\Models\Document;
use App\Models\TitreFoncier;
use App\Models\Sales\Saleable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sale extends Model
{
    use HasFactory;
    protected $guarded = [];
   
    public function titreFoncier()
    {
        return $this->belongsTo(TitreFoncier::class, 'titre_foncier_id');
    }
    public function saleables()
    {
        return $this->hasMany(Saleable::class);
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function documents()
    {
        return $this->hasMany(Document::class);
    }

    protected $casts = [
        'document_path' => 'array',
    ];

    public static function search($query)
    {
        return empty($query) ?
            static::query() :
            static::query()
            ->where(function ($q) use ($query) {
                $q->where('sales_amount', 'like', '%' . $query . '%');
                $q->orWhere('sales_code', 'like', '%' . $query . '%');
                $q->orWhere('sales_type', 'like', '%' . $query . '%');
                $q->orWhere('user_id', 'like', '%' . $query . '%');
                $q->orWhere('payment_status', 'like', '%' . $query . '%');
                $q->orWhere('service_id', 'like', '%' . $query . '%');
                $q->orWhere('sales_type', 'like', '%' . $query . '%');
                
            });
    }

    public function getStatusStyleAttribute() : String
    {
        return match ($this->payment_status) {
             'totally_paid' => 'success',
             'partially_paid' => 'info',
             'pending_payment' => 'secondary',
             NULL => ''
        };
    }
    public function getStatusTextAttribute(): String
    {
        return match ($this->payment_status) {
            'totally_paid' => 'Totally Paid',
            'partially_paid' => 'Partially Paid',
            'pending_payment' => 'Pending Payment',
            NULL => ''
        };
    }

    public function getSaleTypeStyleAttribute(): String
    {
        return match ($this->sales_type) {
            'etat_cession' => 'info',
            'certificate_propriete' => 'primary',
            'mutation_totale_normale' => 'success',
            'mutation_totale_par_deces' => 'danger',
            'morcellement_normale' => 'secondary',
            'morcellement_forcee' => 'tertiary', 
            'retrait_indivision' => 'dark',
            default => ''
        };
    }
    public function getSaleTypeTextAttribute(): String
    {
        return match ($this->sales_type) {
            'etat_cession' => 'Etat Cession',
            'certificate_propriete' => 'Certificate Propriete',
            'mutation_totale_normale' => 'Mutation Totale',
            'mutation_totale_par_deces' => 'Mutation Par Deces',
            'morcellement_normale' => 'Morcellement',
            'morcellement_forcee' => 'Morcellement Force',
            'retrait_indivision' => 'Retrait D\'indivision',
            default => ''
        };
    }

}
