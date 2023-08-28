<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Models\Sales\Sale;
use Illuminate\Support\Str;
use App\Models\TitreFoncier;
use Laravel\Sanctum\HasApiTokens;
use App\Models\CertificatePropriete;
use App\Models\ImmatriculationDirecte;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'id_card_number',
        'date_of_birth',
        'place_of_birth',
        'primary_phone_number',
        'secondary_phone_number',
        'address',
        'email',
        'password',
        'service_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'date_of_birth' => 'date',
        'password' => 'hashed',
        'is_active' => 'boolean',
    ];

    /**
     * Get the user's preferred locale.
     *
     * @return string
     */
    public function preferredLocale()
    {
        return $this->preferred_language;
    }

    public function scopeActive($query): Builder
    {
        return $query->where('is_active', 1);
    }
    
    public function scopeInActive($query): Builder
    {
        return $query->where('is_active', 0);
    }

    
    public function getNameAttribute()
    {
        return $this->first_name . " " . $this->last_name;
    }

    public function getInitialsAttribute()
    {
        return strtoupper(Str::substr($this->first_name, 0, 1)) . "" . strtoupper(Str::substr($this->last_name, 0, 1));
    }

    public function getStatusStyleAttribute()
    {
        return match ($this->is_active) {
            true => 'success',
            false => 'danger',
            NULL => 'info'
        };
    }
   
    public function getStatusTextAttribute()
    {
        return match ($this->is_active) {
            true => __('Active'),
            false => __('Banned'),
            NULL => __('Active'),
        };
    }

    public function titrefonciers() : BelongsToMany
    {
        return $this->belongsToMany(TitreFoncier::class,'titrefoncier_user','titre_foncier_id','user_id')->withTimestamps();
    }

    public function imma_directe_main() : BelongsToMany
    {
        return $this->belongsToMany(ImmatriculationDirecte::class,'requestor_id')->withTimestamps();
    }

    public function certificatepropriete() : BelongsToMany
    {
        return $this->belongsToMany(CertificatePropriete::class,'titrefoncier_user','user_id','titre_foncier_id')->withTimestamps();
    }
    
    public static function search($query)
    {
        return empty($query) ?
            static::query() :
            static::query()
            ->where(function ($q) use ($query) {
                $q->where('first_name', 'like', '%' . $query . '%');
                $q->orWhere('last_name', 'like', '%' . $query . '%'); 
            });
    }

}
