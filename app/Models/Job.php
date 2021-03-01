<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;
    public function jobTrack()
    {
        return $this->hasMany(JobTrack::class);
    }
    public function perfomance()
    {
        return $this->hasMany(Perfomance::class);
    }
}
