<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Appointment extends Model
{
    use HasFactory;
    protected $fillable =  ["requirements"];

    public function requirements()
    {
        return $this->hasMany(Requirement::class);

    }

    public function services():hasOne
    {
        return $this->hasOne(Service::class,'id','service_id');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

}
