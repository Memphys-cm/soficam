<?php

namespace App\Models\Sales;

use App\Models\EtatCession;
use App\Models\Traits\HasUUID;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Saleable extends Model
{
    use HasFactory, HasUUID;
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

    public function releveImmobilier()
    {
        return $this->belongsTo(ReleveImmobilier::class); // Update the foreign key column name
    }

}
