<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prof extends Model
{
    use HasFactory;
    public function groupes()
    {
        return $this->belongsToMany(Groupe::class, 'groupe_prof')->withTimestamps();
    }

    public function matiere()
    {
        return $this->belongsTo(Matiere::class);
    }

    public function seances()
    {
        return $this->hasMany(Seance::class);
    }

}
