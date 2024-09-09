<?php

namespace App\Models\Sales;

use App\Models\CertificatePropriete;
use App\Models\EtatCession;
// use App\Models\Traits\HasUUID;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Saleable extends Model
{
    use HasFactory;
    protected $table = 'saleables';
    protected $guarded = [];

    public function sale()
    {
        return $this->belongsTo(Sale::class, 'sale_id');
    }

    public function etat_cession()
    {
        return $this->belongsTo(EtatCession::class, 'saleable_id');
    }

    public function saleable()
    {
        return $this->morphTo();
    }

    public function certificat()
    {
        return $this->belongsTo(CertificatePropriete::class, 'saleable_id');
    }

    public function releveImmobilier()
    {
        return $this->belongsTo(ReleveImmobilier::class); // Update the foreign key column name
    }

}
