<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{
    protected $fillable = ['first_name', 'last_name', 'age', 'sex', 'country', 'has_won_awards'];

    // Definieer de Many-to-Many relatie met Media
    public function media()
    {
        return $this->belongsToMany(Media::class);
    }
}
