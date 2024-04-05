<?php

// app/Models/Planet.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Planet extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'solar_system_id',
        // other planet fields
    ];

    public function solarSystem()
    {
        return $this->belongsTo(SolarSystem::class);
    }
}
