<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    use HasFactory;
    
    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function truckerCompany()
    {
        return $this->hasOne(TruckerCompany::class);
    }
}
