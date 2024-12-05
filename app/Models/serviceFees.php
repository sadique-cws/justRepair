<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ServiceFees extends Model
{
    use HasFactory;

    
    public function subFees(): HasMany
    {
        return $this->hasMany(ServiceFees::class, 'parent_id', 'id');
    }
}
