<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Service extends Model
{
    use HasFactory;
    
    public function requirements(): HasMany
    {
        return $this->hasMany(Requirement::class, 'service_id', 'id');
    }
}
