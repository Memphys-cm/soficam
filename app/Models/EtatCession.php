<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EtatCession extends Model
{
    use HasFactory;

    public function geometre() : BelongsTo
    {
        return $this->belongsTo(User::class , 'geometre_id');
    }

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class , 'user_id');
    }
    
}
