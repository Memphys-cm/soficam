<?php

namespace App\Models\Registration;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HousingEstate extends Model
{
    use HasFactory;

    public $guarded = [];

    public function blocks() : HasMany
    {
        return $this->hasMany(Block::class);
    }

}
