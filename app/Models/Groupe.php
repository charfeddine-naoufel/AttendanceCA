<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Groupe extends Model
{
    use HasFactory;
    public function niveau()
    {
        return $this->belongsTo(Niveau::class);
    }
    public function matiere()
    {
        return $this->belongsTo(Matiere::class);
    }

    public function eleves()
    {
        return $this->belongsToMany(Eleve::class);
    }

    public function profs()
    {
        return $this->belongsToMany(Prof::class);
    }

    public function seances()
    {
        return $this->hasMany(Seance::class);
    }
    
}
