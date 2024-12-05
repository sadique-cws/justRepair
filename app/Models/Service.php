<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\str;

class Service extends Model
{
    use HasFactory;

    protected static function boot()
    {
        parent::boot();

        // Generate slug before saving
        static::saving(function ($service) {
            $service->slug = Str::slug($service->name);
        });
    }

    
    public function requirements(): HasMany
    {
        return $this->hasMany(Requirement::class, 'service_id', 'id');
    }

    public function servicefees(): HasMany
    {
        return $this->hasMany(ServiceFees::class,'service_id', 'id');
    }
}
