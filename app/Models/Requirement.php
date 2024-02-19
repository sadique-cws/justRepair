<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requirement extends Model
{
    use HasFactory;
    protected $fillable =  ["requirement",];

    public function appointment()
    {
        return $this->belongsTo(Appointment::class);
    }
}
